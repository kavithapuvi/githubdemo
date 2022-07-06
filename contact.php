<?php
    session_start();
?>
<?php include 'includes/header.php'; ?>

    <div class="pageTitle">Contact us</div>

    <section class="contactpage py-5" id="scroll_to_here">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <?php
                        $base_url="http://";
                        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=="on"){
                            $base_url="https://";
                        }
                        $base_url.=$_SERVER['SERVER_NAME'];
                        $script_name=$_SERVER['SCRIPT_NAME'];
                        $base_url.=substr($script_name,0,strrpos($script_name,"/")+1);
                        $base_url.="contacthandler.php";
                    ?>
                    <form id="contact_form" action="<?php echo $base_url; ?>" method="post" >
                        <div class="form-group">
                            <input type="text" name="name" class="form-control f-required" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control f-required f-email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control f-required f-phone" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control f-required" rows="3" placeholder="Message"></textarea>
                        </div>
                        <button class="btn btn-danger" type="button" id="contact_form_btn" >Send</button>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.2821367810734!2d80.22064631413565!3d13.017696817388867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52670fa55b3b7f%3A0x5760fa8ca410fa62!2sYRS%20Enterprises!5e0!3m2!1sen!2sin!4v1648200414482!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
      
    </section>

<?php include 'includes/footer.php'; ?>
<script type="text/javascript">

    let form=$('#contact_form');
    let scroll_to_here=$('#scroll_to_here');
    let placeholders=[];
    let inputs=form.find('input,textarea');
    for(let i=0;i<inputs.length;i++){
        placeholders.push($(inputs[i]).attr("placeholder"));
    }

    $('#contact_form_btn').on('click',function(evt){
        let form_valid=true;
        let f_required=form.find('.f-required');

        for(let i=0;i<inputs.length;i++){
            $(inputs[i]).attr("placeholder",placeholders[i]);
        }

        for(let i=0;i<f_required.length;i++){
            let value=$(f_required[i]).val();
            if(isEmpty(value)){
                let txt="Please fill the "+$(f_required[i]).attr("placeholder")+" field ";
                $(f_required[i]).attr("placeholder",txt);
                $(f_required[i]).addClass("f-error");
                form_valid=false;
            }else{
                $(f_required[i]).removeClass("f-error");
            }
        }

        let f_email=form.find('.f-email:not(.f-error)');
        for(let i=0;i<f_email.length;i++){
            let value=$(f_email[i]).val();
            if(!validEmail(value)){
                let txt="Invalid "+$(f_email[i]).attr("placeholder")+" ";
                $(f_email[i]).val('');
                $(f_email[i]).attr("placeholder",txt);
                $(f_email[i]).addClass("f-error");
                form_valid=false;
            }else{
                $(f_email[i]).removeClass("f-error");
            }
        }

        let f_phone=form.find('.f-phone:not(.f-error)');
        for(let i=0;i<f_phone.length;i++){
            let value=$(f_phone[i]).val();
            if(!validPhone(value)){
                let txt="Invalid "+$(f_phone[i]).attr("placeholder")+" ";
                $(f_phone[i]).val('');
                $(f_phone[i]).attr("placeholder",txt);
                $(f_phone[i]).addClass("f-error");
                form_valid=false;
            }else{
                $(f_phone[i]).removeClass("f-error");
            }
        }

        $('html,body').animate({
            scrollTop:scroll_to_here.offset().top
        },200);

        if(form_valid){
            form.submit();
        }
    });


    function isEmpty(value){
        if(value===null || value===undefined || value.trim()===""){
            return true;
        }
        return false;
    }

    function validPhone(value){
        let pattern=/^\+?[0-9]{10,13}$/;
        return pattern.test(value);
    }

    function validEmail(value){
        let pattern=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        return pattern.test(value);
    }

    <?php
        if(isset($_SESSION['op_status'])){ ?>
        alert('<?php echo $_SESSION["op_status"] ;?>');
    <?php
        unset($_SESSION['op_status']);
        }
    ?>
</script>
</body>
</html>