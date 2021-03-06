<?php
include_once $this->getPart('/web/merchant/common/header.php');
include_once $this->getPart('/web/merchant/common/sidebar.php');
?>
<div class="col-md-11 col-sm-10 col-xs-10 pull-right">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="desbord_body check_outstp">
            <div class="row">
                <?php if (!empty($message)): ?>
                    <div class="message col-md-12 col-sm-12 col-xs-12">
                        <div class="<?php if ($message['type'] == 'success'): ?>success<?php elseif ($message['type'] == 'error'): ?>error<?php endif; ?>">
                            <?php if ($message['type'] == 'success'): ?>
                                <?= $message['text']; ?>
                            <?php elseif ($message['type'] == 'error'): ?>
                                <ul>
                                    <?php foreach ($message['errors'] as $errors): ?>
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= $error; ?></li>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <form method="POST" id="settings"> 
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="yor_active" style="border:0">
                        <div class="order-active">
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <h6>Account Settings</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>Title:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <select class="inpttest" name="title" style="padding: 9px">
                                    <option value="Mr" <?= ($user['title'] == 'Mr')? 'selected' : ''; ?>>Mr.</option>
                                    <option value="Miss" <?= ($user['title'] == 'Miss')? 'selected' : ''; ?>>Miss</option>
                                    <option value="Mrs" <?= ($user['title'] == 'Mrs')? 'selected' : ''; ?>>Mrs.</option>
                                </select>
                            </div>
                        </div>
                    </div>                    
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>Frist name:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <input type="text" class="inpttest" alt="" value="<?= $user['first_name']; ?>" name="first_name" required data-parsley-required-message="Please enter first name">
                            </div>
                        </div>
                    </div>
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>Last name:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <input type="text" class="inpttest" alt="" value="<?= $user['last_name']; ?>" name="last_name" required data-parsley-required-message="Please enter last name">
                            </div>
                        </div>
                    </div>
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>Email
                                <br> Address:
                            </label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <input type="email" class="inpttest" alt="" value="<?= $user['email']; ?>" name="email" required data-parsley-required-message="Please enter email" data-parsley-type-message="Email must be valid">
                            </div>
                        </div>
                    </div>
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>Country:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <select class="inpttest" name="country" style="padding: 9px" required data-parsley-required-message="Please select a country">
                                    <?php foreach ($countries as $code => $country): ?>
                                    <option data-dial-code="<?= $country['dial_code']; ?>" value="<?= $code; ?>" <?= ($user['country'] == $code)? 'selected' : ''; ?>><?= $country['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>                       
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>Mobile Number:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3" style="padding:0">
<!--                                    <select class="inpttest" name="mobile_number_prefix" style="padding: 9px" required data-parsley-required-message="Please select a mobile number prefix">
                                    <?php 
                                        $dial_codes = array();
                                        foreach($countries as $country){
                                            
                                            if(!in_array($country['dial_code'], $dial_codes))
                                            $dial_codes[] = $country['dial_code'];
                                            
                                        }
                                        
                                        asort($dial_codes);
                                    ?>
                                    <?php foreach ($dial_codes as $dial_code): ?>
                                    <option value="<?= $dial_code; ?>" <?= ($user['mobile_number_prefix'] == $dial_code)? 'selected' : ''; ?>><?= $dial_code; ?></option>
                                    <?php endforeach; ?>
                                    </select>-->
                                    <input class="inpttest" name="mobile_number_prefix" required data-parsley-required-message="Please select a mobile number prefix" value="<?= $user['mobile_number_prefix']; ?>" readonly>
                                </div>
                                <div style="padding:0" class="col-md-9"><input type="text" data-parsley-type="digits" class="inpttest" alt="" value="<?= $user['mobile_number']; ?>" name="mobile_number" required data-parsley-required-message="Please enter mobile number"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12"></div>
<!--                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="yor_active" style="border:0">
                        <div class="order-active">
                            <div class="col-md-4 col-sm-5">
                                <h6>Security</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>Current
                                <br> Password:
                            </label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <input type="text" class="inpttest" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>New
                                <br> Password:
                            </label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <input type="text" class="inpttest" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="showing_form">
                        <div class="col-md-3">
                            <label>Repeat
                                <br> Password:
                            </label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <input type="text" class="inpttest" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12"></div>-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="yor_active" style="border:0">
                        <div class="order-active">
                            <div class="col-md-4 col-sm-5">
                                <h6>Marketing & Communications</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="check_bx">
                            <label class="control control--checkbox">
                                <input type="checkbox" name="accept_promotional_mails" <?= ($user['accept_promotional_mails'])? 'checked' : ''; ?> value="1">
                                <div class="control__indicator"></div>
                            </label>
                            <span>Receive regular updated from Tagzie including news, features, updates, promotions and discounts.</span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="check_bx">
                            <label class="control control--checkbox">
                                <input type="checkbox" name="accept_thirdparty_mails" <?= ($user['accept_thirdparty_mails'])? 'checked' : ''; ?> value="1">
                                <div class="control__indicator"></div>
                            </label>
                            <span>Receive emails from selected third parties - Tagzie will never sell your data or give your contact details to any other party.</span>
                        </div>
                        <div class="submit_in">
                            <button type="submit" href="" class="submit_form " name="save_user" style="border:none">Submit</button>
                        </div>  
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    
    $(document).ready(function () {
        $('#settings').parsley();
        
        $('select[name="country"]').change(function () {

            $('input[name="mobile_number_prefix"]').val($(this).find(':selected').data('dial-code'));
        });        
    });

</script>
<?php include_once $this->getPart('/web/merchant/common/footer.php'); ?>