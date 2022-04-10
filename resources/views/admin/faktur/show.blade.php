<html>

<head>
    <title>{{ config('app.name') }} - Invoice No {{ $faktur->no_faktur }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style type="text/css">
        body {
            margin: 10px;
            padding: 0px;
            background-image: url(images/design/bg/bg81.jpg);
        }

        *html body {
            text-align: center;
        }

        body,
        p,
        td {
            font-family: verdana;
            font-size: 11px;
        }

        p {
            margin: 0px;
            padding: 0px;
        }

        button {
            border: 0px;
            background-color: #FFFFFF;
        }

        button:hover {
            background-color: #ffeeee;
        }

        a {
            color: #ff5733;
            text-decoration: none;
        }

        a:hover {
            color: #aa2222;
        }

        a:visited {
            color: #ff5733;
        }

        a img {
            border: 0px;
        }

        a:hover img {
            border: 1px outset #CCCCCC;
        }

        form {
            margin: 0px;
            padding: 0px;
        }

        /***********************************************************/
        #main {
            margin: 0px;
            margin: auto;
            padding: 5px;
            width: 1000;
            background-color: #ffffff;
            position: relative;
            border: 1px solid #cccccc;
        }

        #small_window {
            background-color: #ffffff;
            margin: 0px;
            padding: 10px;
        }

        #small_window_title {
            border: 4px double #ffffff;
            background-color: #88bbee;
            text-align: center;
            font-size: 300%;
            padding: 10px;
            margin-bottom: 20px;
            color: #900c3f;
        }

        #small_window_subtitle {
            left: 20px;
            position: relative;
            margin: 0px 0px 20px 0px;
            padding: 0px;
            font-size: 200%;
            text-align: left;
        }

        #header {
            width: 1000;
        }

        #header img {
            width: 1000;
        }

        #dynamicText {
            font-size: 110%;
        }

        #dynamicTextArea {
            top: 30px;
            left: 60px;
            position: absolute;
            text-align: left;
            height: 0px;
        }

        #companyName {
            font-size: 300%;
            font-weight: bold;
            display: none;
        }

        #companyLogo {
            display: none;
        }

        #tagLine {
            display: none;
            color: #900c3f;
        }

        #mainmenu {
            background-color: #88bbee;
            padding: 7px;
            margin: 0px;
            margin-top: 2px;
            text-align: center;
            color: #1047e3;
            border-bottom: 4px double #ffffff;
        }

        *html #mainmenu {
            margin-right: -10px;
        }

        .menuItem_style {
            margin: 0px;
            padding: 0px;
            display: inline;
        }

        .menuItem {
            display: inline;
        }

        .menuItem a {
            padding: 5px 10px 5px 10px;
            font-weight: bold;
            color: #1047e3
        }

        .menuItem a:hover {
            color: #88bbee;
            background-color: #1047e3;
        }

        #quickmenu {}

        #centerArea {
            width: 790;
            float: left;
        }

        #sideArea {
            float: left;
            width: 210;
        }

        *html #sideArea {
            width: 205;
        }

        #sideArea2 {
            float: ;
            width: 210;
        }

        *html #sideArea2 {
            width: 205;
        }

        #sideAreaBottom {
            width: 210;
            display: none;
        }

        *html #sideAreaBottom {
            width: 205;
        }

        .sideImage {
            margin: auto;
            text-align: center;
        }

        .sideImage img {
            width: 210;
        }

        *html .sideImage img {
            width: 205;
        }

        #bottom-style {
            margin: 0;
            padding: 0;
        }

        #bottom {
            clear: both;
            background-color: #88bbee;
            color: #1047e3;
            font-size: 80%;
            padding: 10px;
            text-align: center;
        }

        *html #bottom {
            margin-right: -10px;
        }

        #bottom a {
            color: #1047e3;
        }

        /****************************************************************/
        #content,
        #content_product {
            width: 770;
            margin: auto;
            margin-top: 20px;
        }

        #content_titlesite {
            left: 20px;
            position: relative;
            margin: 0px 0px 20px 0px;
            padding: 0px;
            font-size: 250%;
            text-align: left;
            width: 740;
        }

        #content_subtitle {
            left: 10px;
            position: relative;
            margin: 0px 0px 20px 0px;
            padding: 0px;
            font-size: 200%;
            text-align: left;
            width: 730;
        }

        #content_subtitle_2 {
            left: 10px;
            position: relative;
            margin: 0px 0px 20px 0px;
            padding: 0px;
            font-size: 150%;
            text-align: left;
            width: 730;
        }

        #title_design {
            float: left;
            position: relative;
        }

        .title_design1 {
            width: 15px;
            height: 15px;
            border: 4px double #88bbee;
            background-color: #ffffff;
        }

        .title_design2 {
            position: relative;
            width: 20px;
            height: 20px;
            background-color: #88bbee;
            top: -15px;
            left: 8px;
        }

        #content_product img,
        #content img {
            margin: 10px;
        }

        #content_text {
            text-align: left;
            padding: 10px;
        }

        #content_text a:hover {
            color: #aa2222
        }

        #overview_general {
            width: 770;
            margin: auto;
            margin-top: 10;
            margin-bottom: 10;
        }

        .ov_title_style {
            margin: 0;
            padding: 0;
        }

        .ov_title {
            padding: 5px;
            font-size: 130%;
            font-weight: bold;
            color: #900c3f;
            background-color: #88bbee;
            border-bottom: 4px double #ffffff;
            text-align: center;
        }

        .ov_content {
            border: 1px solid #cccccc;
            padding: 5px;
        }

        *html .ov_content {
            border: 0px;
        }

        .ov_item_title {
            color: #900c3f;
            text-align: left;
            font-weight: bold;
            font-size: 130%;
            margin: 10px 0px 5px 0px;
        }

        .ov_item_title a {
            color: #ff5733
        }

        .ov_item_title a:hover {
            color: #aa2222;
        }

        .ov_item_content {
            text-align: left;
            margin-bottom: 30px;
            padding-bottom: 10px;
        }

        /*********************************************************************/
        .clearFloat {
            clear: both;
            height: 0px;
        }

        /*********************************************************************/
        .highlight_top {
            width: 770;
            margin-top: 10px;
        }

        .highlight_2_inline {
            margin-top: 10px;
            width: 750;
            border: 0px;
            border-spacing: 5px;
        }

        .highlight_2_inline td {
            padding: 0px;
        }

        .highlight_3_inline {
            margin-top: 10px;
            width: 770;
            border: 0px;
            border-collapse: collapse;
        }

        .highlight_3_inline td {
            padding: 0px;
        }

        .highlight_middle {
            margin-top: 15px;
            width: 750;
            border: 0px;
            border-spacing: 5px;
        }

        .highlight_middle_item {
            padding: 5px;
            padding-top: 10px;
            float: left;
        }

        .highlight_middle_item img {
            border: 1px solid #CCCCCC;
        }

        .highlight_middle_item img:hover {
            border: 1px solid #1047e3;
        }

        /*********************************************************************/
        /* TEXT **************************************************************/
        /*********************************************************************/
        .smallText {
            font-size: 80%;
        }

        *html .smallText {
            font-size: 9px;
        }

        .hotprice {
            color: #ff0000;
            font-weight: bold;
            font-size: 120%;
        }

        .normalprice {
            color: #000000;
            margin-top: 10px;
            font-size: 120%;
        }

        .oldprice {
            color: #000000;
            text-decoration: line-through;
            margin-top: 10px;
        }

        .bigText {
            font-size: 300%;
            font-weight: bold;
        }

        .bigPriceText {
            font-size: 300%;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .boldText {
            font-weight: bold;
        }

        .error_message {
            color: #FF0000;
            text-align: center;
        }

        .red {
            color: #FF0000;
        }

        /*********************************************************************/
        /* FORM **************************************************************/
        /*********************************************************************/
        .plainButton {
            padding: 0px;
        }

        .mainButton {
            padding: 0px;
            background-color: #FFCCCC;
            border: 2px outset #666666;
        }

        .submitButton {
            padding-left: 10px;
            padding-right: 10px;
        }

        #contact_form {
            margin: auto;
        }

        /*********************************************************************/
        /* COMPLEMENTARY *****************************************************/
        /*********************************************************************/
        .product_complementary {
            text-align: left;
            float: left;
            position: relative;
            margin-top: 20px;
            margin-left: 20px;
        }

        *html .product_complementary {
            margin-left: 0px;
        }

        .complementary {
            width: 24%;
            float: left;
            margin: 2px;
        }

        .complementary_img {
            position: relative;
            height: 150px;
            width: 120px;
        }

        .complementary_img img {
            position: absolute;
            bottom: 0px;
            left: 15px;
            width: 90px;
        }

        .complementary_desc {
            text-align: center;
            margin-top: 20px;
        }

        /*********************************************************************/
        /* ov-HOTDEALS **********************************************************/
        /*********************************************************************/
        .ov_hotdeals {
            width: 24%;
            float: left;
            margin: 2px;
            text-align: center;
        }

        .ov_hotdeals_line {
            margin: 0px;
            padding: 0px;
            clear: both;
        }

        .ov_hotdeals_img {
            position: relative;
            height: 170px;
            width: 100%;
        }

        .ov_hotdeals_img img {
            margin: auto;
        }

        .ov_hotdeals_img img:hover {
            border: 5px solid rgba(132, 132, 132, .5);
            ;
            /* Kode yang digunakan */
            -moz-transform: rotate(0deg);
            -moz-transform: scale(1.4);
            -webkit-transform: rotate(0deg);
            -webkit-transform: scale(1.4);
            -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            /*and give the corners a small curve*/
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .ov_hotdeals_desc {
            width: 100%;
            height: 80px;
        }

        .product_name {
            font-size: 120%;
            font-weight: bold;
        }

        .product_name_big {
            font-size: 170%;
            margin-bottom: 10px;
        }

        .product_img {
            width: 200px;
            float: left;
            margin: 10px;
            position: relative;
        }

        .product_img img {
            border: 1px solid #ffffff;
        }

        .product_img img:hover {
            z-index: 2;
            position: relative;
            border: 5px solid rgba(132, 132, 132, .5);
            ;
            /* Kode yang digunakan */
            -moz-transform: rotate(0deg);
            -moz-transform: scale(1.4);
            -webkit-transform: rotate(0deg);
            -webkit-transform: scale(1.4);
            -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            /*and give the corners a small curve*/
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }

        .product_img_big {
            width: 320px;
            float: left;
            margin: 10px;
            position: relative;
        }

        .product_img_big img {
            margin-bottom: 20px;
        }

        .product_img_big_product img:hover {
            z-index: 2;
            position: relative;
            border: 10px solid rgba(132, 132, 132, .75);
            ;
            /* Kode yang digunakan */
            -moz-transform: rotate(0deg);
            -moz-transform: scale(2);
            -webkit-transform: rotate(0deg);
            -webkit-transform: scale(2);
            -webkit-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            -moz-box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            box-shadow: 0 0 6px rgba(132, 132, 132, .75);
            /*and give the corners a small curve*/
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }

        .product_desc_short {}

        .product_desc_long {
            text-align: left;
            float: left;
            position: relative;
            width: 350;
            padding-top: 10px;
            margin-left: 20px;
        }

        .product_desc_list {
            text-align: left;
            float: left;
            position: relative;
            width: 350;
            padding-top: 10px;
            margin-left: 20px;
        }

        .product_desc_full {
            text-align: left;
            float: left;
            position: relative;
            margin-top: 20px;
            margin-left: 20px;
        }

        *html .product_desc_full {
            margin-left: 0px;
        }

        .product_price {
            text-align: right;
            float: left;
            position: relative;
            width: 150px;
            padding-top: 15px;
        }

        .bg_produk_1 {
            background-color: #ffffff;
            border: 1px solid #cccccc;
            margin-top: 10px;
        }

        .bg_produk_2 {
            background-color: #ffffff;
            border: 1px solid #cccccc;
            margin-top: 10px;
        }

        .cart {}

        /*******************************************************************************/
        /* SIDE AREA *******************************************************************/
        /*******************************************************************************/
        .side_module {
            text-align: center;
            margin-top: 7px;
            margin-bottom: 10px;
            padding-bottom: 5px;
            background-color: #efefef;
        }

        .side_module_product {
            text-align: center;
            margin-top: 7px;
            margin-bottom: 10px;
            padding-bottom: 5px;
            background-color: #efefef;
        }

        .side_title_style {
            margin: 0;
            padding: 0;
        }

        .side_title {
            margin: 0px;
            padding: 0px;
            padding: 5px;
            font-weight: bold;
            font-size: 110%;
            background-color: #88bbee;
            border-bottom: 4px double #ffffff;
            color: #900c3f;
        }

        .side_content_scroller {
            margin: 0px;
            padding-top: 5px;
            max-height: 300px;
            overflow: auto;
        }

        *html .side_content_scroller {
            height: 300px;
        }

        .side_content {
            margin: 0px;
            padding-top: 5px;
        }

        .side_content_custom {
            margin: 0px;
            padding: 0px;
            padding-top: 5px;
        }

        .side_content_custom img {
            width: 160;
        }

        .side_content_item_title {
            margin-bottom: 5px;
            font-size: 110%;
            font-weight: bold;
            color: #900c3f;
            text-align: left;
        }

        .side_content_item_title a {
            color: #ff5733
        }

        .side_content_item_title a:hover {
            color: #aa2222;
        }

        .side_content_item {
            margin: 10px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            text-align: left;
            border-bottom: 1px solid #cccccc;
        }

        /*************************************************************************/
        /* SIDES SCROLLER ********************************************************/
        /*************************************************************************/
        .fieldsetProduct {
            margin: 5px;
            margin-bottom: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: center;
            border: 1px solid #cccccc;
            background-color: #ffffff;
        }

        .fieldsetProductLegend {
            font-weight: bold;
            color: #900c3f;
            margin-bottom: 2px;
        }

        /*************************************************************************/
        /* PRODUCT MENU **********************************************************/
        /*************************************************************************/
        .product_menu_dd_subcategory_1_item {
            margin-left: 5px;
            margin-right: 5px;
            padding: 3px;
            text-align: left;
            font-weight: bold;
        }

        a .product_menu_dd_subcategory_1_item {
            padding-left: 15px;
            background-color: ;
            border-bottom: 1px dashed #88bbee;
        }

        a:hover .product_menu_dd_subcategory_1_item {
            background-color: #bbbbbb;
            border-bottom: 1px dashed #88bbee;
            color: #aa2222
        }

        .product_menu_dd_subcategory_2 {
            display: none;
            margin: 1px;
            margin-left: 5px;
            margin-right: 5px;
            text-align: left;
        }

        a .product_menu_dd_subcategory_2_item {
            padding: 3px;
            padding-left: 40px;
            background-color: ;
            border-bottom: 1px dashed #88bbee;
        }

        .product_menu_dd_subcategory_2_item:hover {
            padding-left: 40px;
            background-color: #bbbbbb;
            border-bottom: 1px dashed #88bbee;
            color: #aa2222
        }

        /*************************************************************************/
        /* NEWSTICKER ************************************************************/
        /*************************************************************************/
        .dynamicBG_1 {
            color: #FF0000;
        }

        .dynamicBG_2 {
            color: #FF00FF;
        }

        .dynamicBG_3 {
            color: #FFFF00;
        }

        .dynamicBG_4 {
            color: #00FF00;
        }

        .dynamicBG_5 {
            color: #0000FF;
        }

        .first_line {
            background-color: #ffffff;
        }

        .second_line {
            background-color: #fafafa;
        }

        /*************************************************************************/
        /* CONTENT TEXT **********************************************************/
        /*************************************************************************/
        .align_right {
            text-align: right;
            padding: 10px;
        }

        .align_left {
            text-align: left;
            padding: 10px;
        }

        .align_center {
            text-align: center;
            padding: 10px;
        }

        .content_item {
            border: 1px solid #cccccc;
            margin: 0px 10px 20px 10px;
        }

        .content_item_title {
            background-color: #f6f6f6;
            padding: 5px;
            font-weight: bold;
        }

        .content_item_content {
            padding: 10px 20px 10px 20px;
        }

        /********************************************************************************/
        .button_table {
            width: 100%;
        }

        #table_wh th {
            background-color: #CCCCCC;
            color: #900c3f;
            font-family: Trebuchet MS;
            font-size: 12px;
            padding: 4px;
        }

        #table_cart,
        #table_wh {
            border-spacing: 2px;
            border: 1px solid #88bbee;
            width: 100%;
        }

        #table_cart th {
            background-color: #88bbee;
            color: #900c3f;
            font-family: Trebuchet MS;
            font-size: 12px;
            padding: 4px;
        }

        #table_cart td,
        #table_wh td {
            padding-right: 4px;
        }

        .table_invoice_receiver td {
            color: #900c3f;
        }

        #table_invoice_print {
            margin: 0px;
            border-collapse: collapse;
            width: 100%;
        }

        #table_invoice_print th {
            border: 2px solid #88bbee;
            padding: 5px;
            margin: 5px;
        }

        #table_invoice_print td {
            padding: 5px;
        }

        #table_invoice_product_print {
            width: 100%;
            border-collapse: collapse;
        }

        #table_invoice_product_print th {
            border: 1px solid #88bbee;
            padding: 10px;
        }

        #table_invoice_product_print td {
            border: 1px solid #88bbee;
            padding: 5px;
        }

        .button_design {
            border: #aaaaaa 1px outset;
            background-color: #efefef;
            color: #666666;
            cursor: pointer;
        }

        .button_design_plain {
            border: #aaaaaa 0px outset;
            background-color: #ffffff;
            color: #ff5733;
            cursor: pointer;
        }

        .column_number {
            text-align: right;
        }

        /********************************************************************************/
        .brandItem {
            border-bottom: 1px dashed #88bbee;
            margin-left: 5px;
            margin-right: 5px;
            padding: 3px;
            padding-left: 15px;
            text-align: left;
            font-weight: bold;
        }

        .brandItem:hover {
            background-color: #bbbbbb;
            border-bottom: 1px dashed #88bbee;
            color: #aa2222
        }

        .brand_img {
            margin-bottom: 10px;
            width: 160;
        }

        /********* SLIDER ***************/
        .clear {
            clear: both
        }

        #gallery {
            margin-top: 10px;
            position: relative;
            width: 770;
            height: 256.66666666667;
        }

        #gallery a {
            float: left;
            position: absolute;
            left: 0;
        }

        #gallery a img {
            border: none;
            width: 770;
            height: 256.66666666667;
        }

        #gallery a.show {
            z-index: 500;
        }

        #gallery .caption {
            z-index: 600;
            background-color: #fff;
            color: #ffffff;
            height: 50px;
            width: 100%;
            position: absolute;
            bottom: 0;
            display: none;
        }

        #gallery .caption .content {
            margin: 5px
        }

        #gallery .caption .content h3 {
            margin: 0;
            padding: 0;
            color: #1DCCEF;
        }

    </style>
</head>

<body data-new-gr-c-s-check-loaded="14.1052.0" data-gr-ext-installed="">
    <div id="small_window">
        <center>
            <table id="table_invoice_print">
                <tbody>
                    <tr>
                        <th>
                            <h1>{{ config('app.name') }}</h1>
                            <p></p>
                        </th>
                        <th>
                            <h2>Invoice no. &nbsp;{{ $faktur->no_faktur }}</h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td width="16%" class="boldtext">Date</td>
                                        <td width="3%" align="center">:</td>
                                        <td width="39%">{{ $faktur->tanggal2 }}</td>
                                    </tr>
                                    <tr>
                                        <td width="16%" class="boldtext">Name</td>
                                        <td width="3%" align="center">:</td>
                                        <td width="39%">{{ $faktur->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="boldtext">Email</td>
                                        <td align="center">:</td>
                                        <td>{{ $faktur->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="boldtext" valign="top">Phone</td>
                                        <td align="center" valign="top">:</td>
                                        <td>{{ $faktur->user->telp . '/' . $faktur->user->hp }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <table id="table_invoice_product_print">
                                <tbody>
                                    <tr align="center">
                                        <th valign="middle">QUANTITY</th>
                                        <th valign="middle">PRODUCT</th>
                                        <th valign="middle">PRICE</th>
                                        <th valign="middle">SUBTOTAL</th>
                                    </tr>
                                    @foreach ($faktur->items as $item)
                                        <tr>
                                            <td align="center">{{ $item->jumlah }}</td>
                                            <td class="">
                                                {{ $item->kode_produk . '-' . $item->kode_produk_stock }}&nbsp; OK 71
                                                {{ $item->product->nama_produk ?? '-' }}
                                            </td>
                                            <td class="column_number">{{ AppHelper::rp($item->harga_satuan ?? 0) }}
                                            </td>
                                            <td class="column_number">{{ AppHelper::rp($item->subtotal ?? 0) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr id="chart">
                                        <th colspan="3" align="right"> SUBTOTAL : &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>
                                            {{ AppHelper::rp($faktur->total_profit ?? 0) }}</th>
                                    </tr>
                                    <tr id="chart">
                                        <th colspan="3" align="right"> Ongkos Kirim : &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>
                                            {{ AppHelper::rp($faktur->deliverycost ?? 0) }}</th>
                                    </tr>
                                    <tr id="chart">
                                        <th colspan="3" align="right"> Diskon : &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>
                                            {{ AppHelper::rp($faktur->discount ?? 0) }}</th>
                                    </tr>
                                    <tr id="chart">
                                        <th colspan="3" align="right"> TOTAL : &nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>
                                            {{ AppHelper::rp($faktur->total_pembayaran ?? 0) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Berat : {{ $faktur->total_weight ?? 0 }} gram</td>
                    </tr>
                    <tr>
                        <td>Admin Note : {!! $faktur->admin_note !!}</td>
                    </tr>
                    <tr>
                        <td width="50%" valign="top">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="3" height="20px">
                                            <h3 class="blue">Receiver</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p><b>{{ $faktur->receiver->receiver_name }} </b><br>
                                                {{ $faktur->receiver->address }}<br> {{ $faktur->receiver->city }}
                                                <br> {{ $faktur->receiver->province }}<br><br>
                                                Kurir : {{ $faktur->deliveryExpedition ?? 'Belum Dikirim' }}<br>No Resi
                                                : {{ $faktur->deliveryResi ?? 'Nomor Resi Belum Ada' }}<br> <br> Phone
                                                : {{ $faktur->receiver->phone }} <br> Mobile :
                                                {{ $faktur->receiver->hp }}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td align="center" valign="top">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="3" height="20px">
                                            <h3 class="blue">Payment</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p>{{ $faktur->payment->description }}<br> Payment information:
                                                Invoice no.{{ $faktur->no_faktur }} </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><br>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <h3 class="boldText red"><br>Thank You!<br><br></h3>
                        </td>
                    </tr>
                </tbody>
            </table> <br> <br>
            <form action="javascript:window.print()"> <input type="submit" name="continue"
                    value="&nbsp;&nbsp;Print Faktur&nbsp;&nbsp;" class="submitButton"> </form>
        </center>
    </div>

</html>
