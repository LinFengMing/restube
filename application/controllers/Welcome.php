<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_category');
        $this->load->model('mod_product');
        $this->load->model('mod_news');
        $this->load->model('mod_order');
        $this->load->model('mod_member');
    }

    // 前台首頁
    public function index()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube",
            'path' => 'index',
            'page' => 'store.php',
            'menu' => 'index',
        );

        $view_data['feature'] = $this->mod_product->get_feature();
        $view_data['cart'] = $this->cart->contents(true);

        $this->load->view('layout', $view_data);
    }

    // 最新消息
    public function news()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Shoper - News",
            'path' => 'news',
            'page' => 'news.php',
            'menu' => 'news',
        );

        $view_data['news'] = $this->mod_news->get_news();
        $view_data['cart'] = $this->cart->contents(true);

        $this->load->view('layout', $view_data);
    }

    // 關於我們
    public function about()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - About",
            'path' => 'about',
            'page' => 'about.php',
            'menu' => 'about',
        );

        $view_data['cart'] = $this->cart->contents(true);

        $this->load->view('layout', $view_data);
    }

    // 聯絡我們
    public function contact()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - Contact",
            'path' => 'contact',
            'page' => 'contact.php',
            'menu' => 'contact',
        );

        $view_data['cart'] = $this->cart->contents(true);

        $this->load->view('layout', $view_data);
    }

    // 所有商品
    public function products($id)
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - Products",
            'path' => 'products' . '/' . $id,
            'page' => 'products.php',
            'menu' => 'products',
        );

        //$limit = 10;

        // if ($this->input->get('per_page')) {
        //     $pervious = $this->input->get('per_page');
        // } else {
        //     $pervious = 1;
        // }

        //$view_data['category_link'] = $id;
        //$view_data['total_all'] = $this->mod_product->get_online_total();
        //$view_data['category'] = $this->mod_category->get_all();
        $view_data['list'] = $this->mod_product->get_category_products_all($id, 0, 0);
        //$view_data['total'] = $this->mod_product->get_category_products_total($id);
        //$view_data['pagination'] = $this->pagination($view_data['path'], $view_data['total'], $limit);
        //$view_data['cart'] = $this->cart->contents(true);

        $this->load->view('layout', $view_data);
    }

    // 商品頁面
    public function product($id)
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - Product",
            'path' => 'product',
            'page' => 'product.php',
            'menu' => 'product',
        );

        $view_data['cart'] = $this->cart->contents(true);
        $view_data['product'] = $this->mod_product->get_once($id);
        $view_data['image_list'] = $this->mod_product->get_image_list($id);

        if ($view_data['product']) {
            $this->load->view('layout', $view_data);
        } else {
            redirect(base_url());
        }
    }

    // 訂單頁面
    public function order()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - Order",
            'path' => 'order',
            'page' => 'order.php',
            'menu' => 'order',
        );

        if ($this->mod_member->chk_login_status())
        {
            if ($this->input->post('rule') == 'order')
            {
                $view_data['cart'] = $this->cart->contents(true);

                $buy_name = $this->input->post('order_name');
                $buy_phone = $this->input->post('order_phone');
                $buy_email = $this->input->post('order_email');
                $buy_addr = $this->input->post('order_addr');
                $buy_remark = $this->input->post('order_remark');

                $dataOrderMain = array(
                    'id' => uniqid(),
                    'buy_id' => $this->session->userdata('user_id'),
                    'buy_name' => $this->security->xss_clean($buy_name),
                    'buy_phone' => $this->security->xss_clean($buy_phone),
                    'buy_email' => $this->security->xss_clean($buy_email),
                    'buy_addr' => $this->security->xss_clean($buy_addr),
                    'buy_remark' => $this->security->xss_clean($buy_remark),
                    'payment' => 1,
                    'create_date' => date('Y-m-d'),
                    'create_time' => date('H:i:s'),
                    'update_date' => date('Y-m-d'),
                    'update_time' => date('H:i:s'),
                );

                if ($dataOrderMain['buy_name'] != '' && $dataOrderMain['buy_phone'] != '' && $dataOrderMain['buy_email'] != '' && $dataOrderMain['buy_addr'] != '')
                {
                    foreach ($view_data['cart'] as $key => $value)
                    {
                        $dataOrderSub[$key]['id'] = uniqid();
                        $dataOrderSub[$key]['order_id'] = $dataOrderMain['id'];
                        $dataOrderSub[$key]['product_id'] = $value['id'];
                        $dataOrderSub[$key]['product_name'] = $value['name'];
                        $dataOrderSub[$key]['product_price'] = $value['price'];
                        $dataOrderSub[$key]['product_qty'] = $value['qty'];
                        $dataOrderSub[$key]['product_photo'] = $value['options']['image'];

                        if ($this->mod_product->chk_exist($value['id']))
                        {
                            if ($this->mod_product->chk_reserve($value['id'], $value['qty']))
                            {
                                if ($this->mod_product->update_reserve($value['id'], $value['qty']))
                                {

                                } else {
                                    $dataResponse['sys_code'] = 500;
                                    $dataResponse['sys_msg'] = '商品目前庫存不足！';
                                }
                            } else {
                                $dataResponse['sys_code'] = 500;
                                $dataResponse['sys_msg'] = '商品目前庫存不足！';
                            }
                        } else {
                            $dataResponse['sys_code'] = 404;
                            $dataResponse['sys_msg'] = '商品不存在！';
                        }
                    }

                    $this->mod_order->insert($dataOrderMain);
                    $this->mod_order->insert_sub($dataOrderSub);
                    $this->cart->destroy();
                    redirect(base_url('complete/'.$dataOrderMain['id'].''));
                } else {
                    $view_data['sys_code'] = 404;
                    $view_data['sys_msg'] = '您的表單尚未填寫完成！';
                }
            } else {
                $view_data['cart'] = $this->cart->contents(true);
                $view_data['user'] = $this->mod_member->get_once($this->session->userdata('user_id'));
            }

            $this->load->view('layout', $view_data);
        } else {
            redirect(base_url('login'));
        }
    }

    // 訂單完成
    public function complete($id)
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - Complete",
            'path' => 'complete',
            'page' => 'complete.php',
            'menu' => 'complete',
        );

        $view_data['res'] = $this->mod_order->get_once($id);

        if ($view_data['res']) {
            $this->load->view('layout', $view_data);
        } else {
            redirect(base_url('history'));
        }
    }

    // 會員登入
    public function login()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - Login",
            'path' => 'login',
            'page' => 'login.php',
            'menu' => 'login',
        );

        if ($this->input->post('rule') == 'login') {
            $email = $this->input->post('email');
            $pwd = $this->input->post('password');

            $email = $this->security->xss_clean($email);
            $pwd = $this->security->xss_clean($pwd);

            if ($email != '' && $pwd != '') {
                if ($this->mod_member->chk_login($email, $pwd)) {
                    // 登入中
                    $this->mod_member->do_login($email);
                    redirect(base_url('index'));
                } else {
                    $view_data['error'] = "登入失敗，信箱密碼錯誤！";
                }
            } else {
                $view_data['error'] = '您的表單尚未填寫完成！';
            }
        } else {
            if ($this->mod_member->chk_login_status()) {
                redirect(base_url('index'));
            }
        }

        $view_data['cart'] = $this->cart->contents(true);

        $this->load->view('layout', $view_data);
    }

    // 會員
    public function member()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - Member",
            'path' => 'member',
            'page' => 'member.php',
            'menu' => 'member',
        );

        if ($this->mod_member->chk_login_status())
        {
            if ($this->input->post('rule') == 'update')
            {
                $id = $this->input->post('id');
                $email = $this->input->post('email');
                $nickname = $this->input->post('nickname');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $password = $this->input->post('password');
                $confirmPassword = $this->input->post('confirmPassword');
                $password = $this->security->xss_clean($password);
                $confirmPassword = $this->security->xss_clean($confirmPassword);

                $dataArray = array(
                    'email' => $this->security->xss_clean($email),
                    'nickname' => $this->security->xss_clean($nickname),
                    'phone' => $this->security->xss_clean($phone),
                    'address' => $this->security->xss_clean($address),
                );

                if ($dataArray['email'] != '' && $dataArray['nickname'] != '')
                {
                    if (!$this->mod_member->chk_repeat_email($id, $dataArray['email']))
                    {
                        if (($password != '' && $password === $confirmPassword) || $password == '')
                        {
                            if ($password != '' && $password === $confirmPassword)
                            {
                                $dataArray['password'] = sha1($password);
                            }

                            if ($this->mod_member->update($id, $dataArray))
                            {
                                $view_data['sys_code'] = 200;
                                $view_data['sys_msg'] = '更新成功！';
                                $this->session->set_userdata('user_email', $dataArray['email']);
                                $this->session->set_userdata('user_name', $dataArray['nickname']);
                                redirect(base_url('member'));
                            } else {
                                $view_data['sys_code'] = 404;
                                $view_data['sys_msg'] = '更新失敗，發生錯誤！';
                            }
                        } else {
                            $view_data['sys_code'] = 404;
                            $view_data['sys_msg'] = '密碼不一樣！';
                        }
                    } else {
                        $view_data['sys_code'] = 404;
                        $view_data['sys_msg'] = '信箱重複！';
                    }
                } else {
                    $view_data['sys_code'] = 404;
                    $view_data['sys_msg'] = '您的表單尚未填寫完成！';
                }
            } else {
                $view_data['user'] = $this->mod_member->get_once($this->session->userdata('user_id'));
                $view_data['cart'] = $this->cart->contents(true);

                $this->load->view('layout', $view_data);
            }
        } else {
            redirect(base_url('login'));
        }
    }

    // 會員登出
    public function logout()
    {
        if ($this->mod_member->logout()) {
            redirect(base_url('login'));
        }
    }

    // 會員註冊
    public function register()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - Register",
            'path' => 'register',
            'page' => 'register.php',
            'menu' => 'register',
        );

        if ($this->input->post('rule') == 'register')
        {
            $email = $this->input->post('email');
            $nickname = $this->input->post('nickname');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');
            $password = $this->input->post('password');
            $confirmPassword = $this->input->post('confirmPassword');
            $password = $this->security->xss_clean($password);
            $confirmPassword = $this->security->xss_clean($confirmPassword);

            $dataArray = array(
                'email' => $this->security->xss_clean($email),
                'password' => $this->security->xss_clean($password),
                'nickname' => $this->security->xss_clean($nickname),
                'phone' => $this->security->xss_clean($phone),
                'address' => $this->security->xss_clean($address),
            );
            echo json_encode($dataArray);
            if ($dataArray['email'] != '' && $dataArray['password'] != '' && $dataArray['nickname'] != '' && $confirmPassword != '')
            {
                if ($dataArray['password'] === $confirmPassword)
                {
                    if (!$this->mod_member->get_once_by_email($dataArray['email']))
                    {
                        $dataArray['id'] = uniqid();
                        $dataArray['password'] = sha1($dataArray['password']);
                        $dataArray['create_date'] = date('Y-m-d');
                        $dataArray['create_time'] = date('H:i:s');

                        if ($this->mod_member->insert($dataArray)) {
                            $view_data['sys_code'] = 200;
                            $view_data['sys_msg'] = '新增成功！';
                            $this->mod_member->do_login($dataArray['email']);
                            redirect(base_url('index'));
                        } else {
                            $view_data['sys_code'] = 404;
                            $view_data['sys_msg'] = '新增失敗，發生錯誤！';
                        }
                    } else {
                        $view_data['sys_code'] = 404;
                        $view_data['sys_msg'] = '信箱重複！';
                    }
                } else {
                    $view_data['sys_code'] = 404;
                    $view_data['sys_msg'] = '密碼不一樣！';
                }
            } else {
                $view_data['sys_code'] = 404;
                $view_data['sys_msg'] = '您的表單尚未填寫完成！';
            }
        } else {
            if ($this->mod_member->chk_login_status())
            {
                redirect(base_url('index'));
            }
        }

        $view_data['cart'] = $this->cart->contents(true);

        $this->load->view('layout', $view_data);
    }

    // 會員歷史訂單
    public function history()
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - history",
            'path' => 'history',
            'page' => 'history.php',
            'menu' => 'history',
        );

        if ($this->mod_member->chk_login_status())
        {
            //$view_data['user'] = $this->mod_member->get_once($this->session->userdata('user_id'));
            $view_data['list'] = $this->mod_order->get_user_oder($this->session->userdata('user_id'));
            $view_data['total'] = $this->mod_order->get_user_oder_total($this->session->userdata('user_id'));
            $view_data['pagination'] = $this->pagination($view_data['path'], $view_data['total'], 10);

            $view_data['cart'] = $this->cart->contents(true);

            $this->load->view('layout', $view_data);
        } else {
            redirect(base_url('login'));
        }
    }

    // 會員歷史訂單內容
    public function history_details($id)
    {
        // 頁面資訊
        $view_data = array(
            'title' => "Restube - history",
            'path' => 'history/details',
            'page' => 'history_details.php',
            'menu' => 'history',
        );

        $view_data['res'] = $this->mod_order->get_once($id);

        if ($view_data['res']) {
            $this->load->view('layout', $view_data);
        } else {
            redirect(base_url('history'));
        }
    }
    /* ************************************ *
     *                                      *
     *               Pagination             *
     *                                      *
     * ************************************ */
    // 分頁
    public function pagination($uri, $total, $per)
    {
        // 載入分頁套件
        $this->load->library('pagination');

        $config['base_url'] = base_url($uri);
        $config['total_rows'] = $total;
        $config['per_page'] = $per;
        // 顯示實際頁面數
        $config['use_page_numbers'] = true;
        // 實際顯示Page在網址上
        $config['page_query_string'] = true;
        // 分頁的左右兩邊加入Tag標籤
        $config['full_tag_open'] = '<div class="ui right floated pagination menu">';
        $config['full_tag_close'] = '</div>';
        // 自訂起始分頁連結名稱
        $config['first_link'] = '第一頁';
        $config['first_tag_open'] = '<li class="item">';
        $config['first_tag_close'] = '</li>';
        // 自訂結束分頁連結名稱
        $config['last_link'] = '最後一頁';
        $config['last_tag_open'] = '<li class="item">';
        $config['last_tag_close'] = '</li>';
        // 自訂下一頁連結名稱
        $config['next_link'] = '<i class="right chevron icon"></i>';
        $config['next_tag_open'] = '<li class="icon item">';
        $config['next_tag_close'] = '</li>';
        // 自訂上一頁連結名稱
        $config['prev_link'] = '<i class="left chevron icon"></i>';
        $config['prev_tag_open'] = '<li class="icon item">';
        $config['prev_tag_close'] = '</li>';
        // 自訂目前分頁連結名稱
        $config['cur_tag_open'] = '<li class="item active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        // 自訂其他分頁連結名稱
        $config['num_tag_open'] = '<li class="item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
}
