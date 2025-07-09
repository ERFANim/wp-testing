<?php
require_once (ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
class WPT_payment_table extends WP_List_Table {

    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable =  $this->get_sortable_columns();
        $order_by = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
        $order = isset($_GET['order'])?trim($_GET['order']):"";
        $search = isset($_POST['s'])?trim($_POST['s']):"";

        $datas = $this->wpt_list_data($order_by,$order,$search);
        $per_page = 15 ;
        $current_page = $this->get_pagenum();
        $total_items = count($datas) >=1 ? count($datas) : 1;

        $this->set_pagination_args(array(
            "total_items" => $total_items,
            "per_page" => $per_page
        ));
        $this->items = array_slice($datas,(($current_page-1)*$per_page),$per_page);



        $this->_column_headers = array($columns,$hidden,$sortable);
    }

    public function wpt_list_data($order_by = '' , $order = '', $search = '')
    {
        global $wpdb;
        $table = $wpdb->prefix . 't_payments';

//        $Amount = $wpdb->get_var('SELECT * FROM ' . $table . ' WHERE authority = ' . $_GET['Authority'] . '  ORDER BY id DESC LIMIT 1');
        if (!empty($search)){
            $payments = $wpdb->get_results('SELECT * FROM ' . $table . ' WHERE date LIKE "%'.$search.'%" ');
            foreach ($payments as $key => $pay){
                $user = get_user_by( 'id', $pay->user_id );
                $post = get_the_title($pay->post_id);
                if ($pay->status == 0)
                    $status = 'پرداخت نشده';
                else
                    $status = 'پرداخت انجام شده';
                if ($pay->used == 0)
                    $used = 'انجام نشده';
                else
                    $used = 'آزمون انجام شده';

                $data []= ([
                    'id' =>  $key+1,
                    'pay_id' =>  $pay->id,
                    'name' => $user->user_nicename ? $user->user_nicename : 'یافت نشد',
                    'email' => $user->user_email ? $user->user_email : 'یافت نشد',
                    'status' => $status ? $status : 'یافت نشد',
                    'test' => $post ? $post : 'یافت نشد',
                    'used' => $used ? $used : 'یافت نشد',
                    'date' => $pay->date,
                ]);
            }
        }else{
            if ($order_by == "date" && $order == "asc"){
                $payments = $wpdb->get_results('SELECT * FROM ' . $table . ' ORDER BY date asc ');
                foreach ($payments as $key => $pay){
                    $user = get_user_by( 'id', $pay->user_id );
                    $post = get_the_title($pay->post_id);
                    if ($pay->status == 0)
                        $status = 'پرداخت نشده';
                    else
                        $status = 'پرداخت انجام شده';
                    if ($pay->used == 0)
                        $used = 'انجام نشده';
                    else
                        $used = 'آزمون انجام شده';

                    $data []= ([
                        'id' =>  $key+1,
                        'pay_id' =>  $pay->id,
                        'name' => $user->user_nicename ? $user->user_nicename : 'یافت نشد',
                        'email' => $user->user_email ? $user->user_email : 'یافت نشد',
                        'status' => $status ? $status : 'یافت نشد',
                        'test' => $post ? $post : 'یافت نشد',
                        'used' => $used ? $used : 'یافت نشد',
                        'date' => $pay->date,
                    ]);
                }
            }elseif ($order_by == "date" && $order == "desc"){
                $payments = $wpdb->get_results('SELECT * FROM ' . $table . ' ORDER BY date desc ');
                foreach ($payments as $key => $pay){
                    $user = get_user_by( 'id', $pay->user_id );
                    $post = get_the_title($pay->post_id);
                    if ($pay->status == 0)
                        $status = 'پرداخت نشده';
                    else
                        $status = 'پرداخت انجام شده';
                    if ($pay->used == 0)
                        $used = 'انجام نشده';
                    else
                        $used = 'آزمون انجام شده';

                    $data []= ([
                        'id' =>  $key+1,
                        'pay_id' =>  $pay->id,
                        'name' => $user->user_nicename ? $user->user_nicename : 'یافت نشد',
                        'email' => $user->user_email ? $user->user_email : 'یافت نشد',
                        'status' => $status ? $status : 'یافت نشد',
                        'test' => $post ? $post : 'یافت نشد',
                        'used' => $used ? $used : 'یافت نشد',
                        'date' => $pay->date,
                    ]);
                }
            }else{
                $payments = $wpdb->get_results('SELECT * FROM ' . $table . '');
                foreach ($payments as $key => $pay){
                    $user = get_user_by( 'id', $pay->user_id );
                    $post = get_the_title($pay->post_id);
                    if ($pay->status == 0)
                        $status = 'پرداخت نشده';
                    else
                        $status = 'پرداخت انجام شده';
                    if ($pay->used == 0)
                        $used = 'انجام نشده';
                    else
                        $used = 'آزمون انجام شده';

                    $data []= ([
                        'id'     =>  $key+1,
                        'pay_id' =>  $pay->id,
                        'name'   => $user->user_nicename ? $user->user_nicename : 'یافت نشد',
                        'email'  => $user->user_email ? $user->user_email : 'یافت نشد',
                        'status' => $status ? $status : 'یافت نشد',
                        'test'   => $post ? $post : 'یافت نشد',
                        'used'   => $used ? $used : 'یافت نشد',
                        'date'   => $pay->date,
                    ]);
                }
            }
        }

        if (!isset($data))
        if (!isset($data))
            $data = [];
        return $data;
    }

    public function get_hidden_columns()
    {
        return array("pay_id");
//        return array("");
    }

    public function get_sortable_columns()
    {
        return array(
//            "id" => array("id",true),
            "date" => array("date",true)
        );
    }

    public function get_columns()
    {
        $columns = array(

            'id'     => 'ردیف',
            'name'    => __('Name'),
            'email'    => __('Email'),
            'status' => 'وضعیت پرداخت',
            'test'  => 'آزمون',
            'used'  => 'وضعیت انجام آزمون',
            'date'   =>__('Date'),
//            'action' => 'Action'
        );
        return $columns;
    }

    public function column_default($item,$column_name)
    {
        switch ($column_name){
            case 'id':
            case 'name':
            case 'email':
            case 'date':
            case 'status':
            case 'test':
            case 'used':
                return $item[$column_name];
//            case 'action' :
//                return '<a href="">'.__('Delete').'</a>';
            default :
                return 'no value';
        }
    }

    public function column_id($item)
    {
        $actions = array(
            "delete" => sprintf('<a href="?post_type=wpt_test&page=%s&action=%s&pay_id=%s">'.__('Delete').'</a>',$_GET['page'],'wpt_payment_delete',$item['pay_id'])
        );
        return sprintf('%1$s %2$s',$item['id'],$this->row_actions($actions));
    }
}

function showPaymentData(){
    $action = isset($_GET['action'])?trim($_GET['action']) : "";
    if ($action == 'wpt_payment_delete'){
        global $wpdb;
        $table = $wpdb->prefix . 't_payments';
        $wpdb->delete( $table, array( 'id' => $_GET['pay_id'] ) );
    }
    ob_start();
    $wpt_payment_table = new WPT_payment_table();

    $wpt_payment_table->prepare_items();
    echo '<h2>لیست پرداخت ها</h2>';
    echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'?post_type=wpt_test&page=wpt_Payments" name="search_payments">';
    $wpt_payment_table->search_box("جستجو",'search_post_id');
    echo '</form>';
    $wpt_payment_table->display();
}

showPaymentData();
