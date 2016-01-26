<?php

/**
 * Template Name: Create Profile Page
 *
 * @package WordPress
 * @subpackage Queen Model
 * @since Twenty Sixteen 1.0
 */
get_header();

if (isset($_POST['btn-create-profile'])) {
    $arg_insert = array();
    if (isset($_POST['fullname'])) {
        $arg_insert['fullname'] = $_POST['fullname'];
    }

    if (isset($_POST['birthday'])) {
        $arg_insert['birthday'] = str_replace("-", "", $_POST['birthday']);
    }

    if (isset($_POST['status'])) {
        $arg_insert['status'] = $_POST['status'];
    }

    if (isset($_POST['gender'])) {
        $arg_insert['gender'] = $_POST['gender'];
    }

    if (isset($_POST['address'])) {
        $arg_insert['address'] = $_POST['address'];
    }

    if (isset($_POST['email'])) {
        $arg_insert['email'] = $_POST['email'];
    }

    if (isset($_POST['facebook'])) {
        $arg_insert['facebook'] = $_POST['facebook'];
    }

    if (isset($_POST['tel'])) {
        $arg_insert['tel'] = $_POST['tel'];
    }

    if (isset($_POST['height'])) {
        $arg_insert['height'] = $_POST['height'];
    }

    if (isset($_POST['weight'])) {
        $arg_insert['weight'] = $_POST['weight'];
    }
    if (isset($_POST['body1'])) {
        $arg_insert['body1'] = $_POST['body1'];
    }

    if (isset($_POST['body2'])) {
        $arg_insert['body2'] = $_POST['body2'];
    }

    if (isset($_POST['body3'])) {
        $arg_insert['body3'] = $_POST['body3'];
    }

    if (isset($_POST['background'])) {
        $arg_insert['background'] = $_POST['background'];
    }

    if (isset($_POST['language'])) {
        $arg_insert['language'] = $_POST['language'];
    }

    if (isset($_POST['exp'])) {
        $arg_insert['exp'] = $_POST['exp'];
    }

    if (isset($_POST['custom_post'])) {
        $arg_insert['custom_post'] = $_POST['custom_post'];
    }

    if ($arg_insert['custom_post'] == "pgpb") {
        if (isset($_POST['tax_pgpb'])) {
            $arg_insert['taxo'] = array(
                'tax' => 'pgpb-category',
                'term' => intval($_POST['tax_pgpb'])
            );
        }
    } else if ($arg_insert['custom_post'] == "models") {
        if (isset($_POST['tax_models'])) {
            $arg_insert['taxo'] = array(
                'tax' => 'model-category',
                'term' => intval($_POST['tax_models'])
            );
        }
    }
    
    
    
    $uploaded_id = upload_custom_post($arg_insert);
    //var_dump($arg_insert);
    //var_dump($_FILES['fileselect']);
    $attach_array = array();
    if ($_FILES['fileselect']) {
        $files = $_FILES['fileselect'];
        foreach ($files['name'] as $key => $value) {
            if ($files['name'][$key]) {
                $file = array( 
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key], 
                    'tmp_name' => $files['tmp_name'][$key], 
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                );
                
                $_FILES = array("fileselect" => $file); 
                foreach ($_FILES as $file => $array) {				
                    $newupload = kv_handle_attachment($file, $uploaded_id);
                    array_push($attach_array, $newupload);
                }
            }
        }
        
        update_field("field_569e36c6a976e", $attach_array, $uploaded_id);
    }
}



?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    
                    <form class="create-profile form-horizontal" action="<?php echo home_url('/create-profile') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-header" >
                            <img src="<?php echo get_template_directory_uri() ?>/img/logo-white.png" />
                        </div>
                        <svg width="0" height="0">
                            <clipPath id="clipPolygon">
                              <polygon points="0 100,200 100,250 0,0 0">
                              </polygon>
                            </clipPath>
                        </svg>
                        <h1><?php _e('[:vi]Form đăng ký Model/PG/PB'); ?></h1>
                        <div class="col-md-6 left-col">
                            <div class="form-group">
                                <label for="inputFullName" class="col-sm-3 control-label"><?php _e('[:en]Full Name[:vi]Họ và Tên') ?><span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="fullname" class="form-control" id="inputFullName" placeholder="Lê Ngọc Minh Châu" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBirthday" class="col-sm-3 control-label"><?php _e('[:en]Birthday[:vi]Ngày sinh') ?><span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" name="birthday" class="form-control" id="inputBirthday" placeholder="02/01/1991" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStatus" class="col-sm-3 control-label"><?php _e('[:en]Status[:vi]Hôn nhân') ?></label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="status" id="inputStatus">
                                        <option value="single">Độc thân</option>
                                        <option value="married">Đã kết hôn</option>
                                    </select>
                                </div>
                                <label for="inputGender" class="control-label"><?php _e('[:en]Gender[:vi]Giới tính') ?><span class="required">*</span>&nbsp;</label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="inlineRadio1" value="female"> <?php _e('[:en]Female[:vi]Nữ') ?>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="inlineRadio2" value="male"> <?php _e('[:en]Male[:vi]Nam') ?>
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputAddress" class="col-sm-3 control-label"><?php _e('[:en]Address[:vi]Địa chỉ') ?></label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-3 control-label"><?php _e('[:en]Email[:vi]Email') ?><span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="sample@gmail.com" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputFacebook" class="col-sm-3 control-label"><?php _e('[:en]Facebook[:vi]Facebook') ?></label>
                                <div class="col-sm-9">
                                    <input type="text" name="facebook" class="form-control" id="inputEmail" placeholder="https://www.facebook.com/xxx">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputTel" class="col-sm-3 control-label"><?php _e('[:en]Tel[:vi]Di động') ?><span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="tel" name="tel" class="form-control" id="inputTel" placeholder="0901.XXX.XXX.XXX" required>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label for="inputHeight" class="col-sm-3 control-label"><?php _e('[:en]Height[:vi]Chiều cao') ?></label>
                                <div class="col-sm-3">
                                    <input type="number" name="height" class="form-control" id="inputHeight" placeholder="170(cm)">
                                </div>
                                <label for="inputWeight" class="col-sm-3 control-label"><?php _e('[:en]Weight[:vi]Cân nặng') ?></label>
                                <div class="col-sm-3">
                                    <input type="number" name="weight" class="form-control" id="inputWeight" placeholder="45(kg)">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputMeasurements" class="col-sm-3 control-label"><?php _e('[:vi]Số đo 3 vòng:[:en]Measurements:'); ?></label>
                                <div class="col-sm-3">
                                    <input type="number" name="body1" class="form-control" id="inputTel" placeholder="100">
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" name="body2" class="form-control" id="inputTel" placeholder="60">
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" name="body3" class="form-control" id="inputTel" placeholder="100">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 right-col">
                            <div class="form-group">
                                <label for="inputBackground" class="col-sm-3 control-label"><?php _e('[:en]Education[:vi]Trình độ') ?></label>
                                <div class="col-sm-9">
                                    <input type="text" name="background" class="form-control" id="inputBackground" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLanguage" class="col-sm-3 control-label"><?php _e('[:en]Language[:vi]Ngoại ngữ') ?></label>
                                <div class="col-sm-9">
                                    <input type="text" name="language" class="form-control" id="inputLanguage" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExp" class="col-sm-3 control-label"><?php _e('[:en]Experiences[:vi]Kinh nghiệm') ?></label>
                                <div class="col-sm-9">
                                    <textarea type="text" name="exp" class="form-control" id="inputExp"></textarea>
                                </div>
                            </div>
                            
                            <div class="divider" ></div>
                            <div class="radio">
                                <label class="main-radio">
                                    <input type="radio" name="custom_post" id="custom-post-model" value="models">
                                    <?php _e("[:en]Model[:vi]Model") ?>
                                </label>
                                <label class="radio-inline first tax-models-label">
                                    <input type="radio" name="tax_models" id="tax-models-1" class="tax-models" value="10"> <?php _e("[:en]Party Model[:vi]Người mẫu dự tiệc") ?>
                                </label>
                                <label class="radio-inline tax-models-label">
                                    <input type="radio" name="tax_models" id="tax-models-2" class="tax-models" value="11"> <?php _e("[:en]Event Model[:vi]Người mẫu chương trình sự kiện") ?>
                                </label>
                            </div>
                            
                            
                            <div class="radio">
                                <label class="main-radio">
                                    <input type="radio" name="custom_post" id="custom-post-pgpb" value="pgpb">
                                    <?php _e("[:en]PG/PB[:vi]PG/PB") ?>
                                </label>
                                <label class="radio-inline first tax-pgpb-label">
                                    <input type="radio" name="tax_pgpb" id="tax-pgpb-1" class="tax-pgpb" value="8"> <?php _e("[:en]Party PG[:vi]PG dự tiệc"); ?>
                                </label>
                                <label class="radio-inline tax-pgpb-label">
                                    <input type="radio" name="tax_pgpb" id="tax-pgpb-2" class="tax-pgpb" value="9"> <?php _e("[:en]Event PG/PG[:vi]PB/PB chương trình sự kiện"); ?>
                                </label>
                            </div>
<!--                            <input type="file" id="inputImages" name="files" multiple="multiple" class="form-control">-->
                            <div class="divider" ></div>
                            <div class="form-group upload-image">
                                <label for="inputImages" id="inputImagesDrag" class="control-label">
                                    
                                    <?php _e('[:en]<i class="fa fa-camera"></i><br />Upload image[:vi]<i class="fa fa-camera"></i><br />Upload image') ?>
                                    <span class="file-count"></span>
                                    <input type="file" id="inputImages" name="fileselect[]" multiple="multiple" class="form-control" accept="image/png, image/jpeg">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-6 clearfix">
                            <p>
                                <?php 
                                _e("[:vi]*Tôi chấp nhận các thỏa thuận sử dụng và bảo mật của website[:en]__");
                                _e("[:vi]Hỗ trợ đăng ký: <strong>01679 639 739</strong> (Mr. Thuận)");
                                ?>
                            </p>
                        </div>
                        <div class="col-md-6" style="text-align: center;">
                            <button type="submit" name="btn-create-profile" class="btn btn-create-profile"><?php _e("[:vi]Tạo hồ sơ [:en]Apply profile"); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>