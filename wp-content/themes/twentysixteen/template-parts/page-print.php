<?php
/**
 * Template Name: Print Page
 *
 * @package WordPress
 * @subpackage Queen Model
 * @since Twenty Sixteen 1.0
 */
get_header();?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p style="text-align: center;">
                        <a href="javascript:history.go(-1)">Trở về trang chủ</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>


<?php
//echo get_template_directory_uri() . "/dompdf";
//set_include_path(get_template_directory_uri() . "/dompdf");
//echo __DIR__;
require_once(__DIR__ . "/../dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();

if (isset($_GET['pid'])) {
    $post_id = $_GET['pid'];
}

$post = get_post($post_id);

$images = get_field('model_image', $post_id);
$image = '';

//var_dump($images[0]);
//echo $_SERVER["DOCUMENT_ROOT"];

if ($images) {
    $image = str_replace('http://localhost:81' ,$_SERVER["DOCUMENT_ROOT"], $images[0]['sizes']['large']) ;
} else {
    $image = "http://placehold.it/350x150";
}

$date = DateTime::createFromFormat('Ymd', get_field('model_birthday', $post_id));

$field = get_field_object('model_status');
$value = get_field('model_status');

//echo $image;

$html = '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,vietnamese" rel="stylesheet" type="text/css">
<style type="text/css">
	    * {
		  font-family: DejaVu Sans, sans-serif;;
		}
	  </style>
</head>
<body>

<img src="' . $image . '">

<table class="table table-striped">
    <tr>
        <th>' . __('[:vi]Họ và Tên:[:en]Full name:') . '</p></th>
        <td colspan="3">' . $post->post_title . '</td>
    </tr>
    <tr>
        <th>' . __('[:vi]Ngày sinh:[:en]Birthday:') . '</th>
        <td colspan="3">' . $date->format('d/m/Y') . '</td>
    </tr>
    <tr>
        <th>' . __('[:vi]Hôn nhân:[:en]Status:') .' </th>
        <td colspan="3"> ' . $field['choices'][ $value ] . '</td>
    </tr>
    <tr>
        <th>' . __('[:vi]Chiều cao:[:en]Height:') . '</th>
        <td>' . get_field('model_height', $post_id) . '&nbsp;(cm)</td>
        <th>' . __('[:vi]Cân nặng:[:en]Weight:') . '</th>
        <td>' . get_field('model_weight', $post_id) . '&nbsp;(kg)</td>
    </tr>
    <tr>
        <th>' . __('[:vi]Số đo 3 vòng:[:en]Measurements:') . '</th>
        <td colspan="3">' . get_field('model_body_1', $post_id) . ' / ' . get_field('model_body_2', $post_id) . ' / ' . get_field('model_body_3', $post_id) . '</td>
    </tr>
    <tr>
        <th>' .  __('[:vi]Trình độ học vấn:[:en]Educational background:') . '</th>
        <td colspan="3">' . get_field('model_level', $post_id) . '</td>
    </tr>
    <tr>
        <th>' . __('[:vi]Ngoại ngữ:[:en]Foreign language:') . '</th>
        <td colspan="3">' . get_field('model_language', $post_id) . '</td>
    </tr>
    <tr>
        <th>' . __('[:vi]Kinh nghiệm:[:en]Experiences:') . '</th>
        <td colspan="3">' . get_field('model_exp', $post_id) . '</td>
    </tr>
</table>
</body>
</html>';

//echo $html;

$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
$dompdf->load_html($html);
$dompdf->render();

$output = $dompdf->output();

$path = __DIR__ . '/../pdf/';
$filename = 'nothing.pdf';
file_put_contents($path . $filename, $output);
$file_to_save = get_template_directory_uri() . '/pdf/' . $filename;

//echo $file_to_save;
fopen($file_to_save, "r");
?>




<script>
    window.location.href = '<?php echo $file_to_save; ?>';
</script>


<?php get_footer(); ?>