<script>
    $(function () {
        $('.select2').select2()

        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
    });
</script>
<script type="text/javascript">
    function isNumberPress(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    function isNumberVal(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
    $(document).ready(function () {
        $("input, textarea").on("keypress", function (e) {
            if (e.which === 32 && !this.value.length)
                e.preventDefault();
        });
    });
    function allowalphaspace(event) {
        var inputValue = event.which;
        if ((inputValue > 47 && inputValue < 58) && (inputValue != 32)) {
            event.preventDefault();
        }
    }
</script>
<script>
    $(document).ready(function () {
        $("#med_plus").click(function () {
            $(".med_add_class").slideToggle('medium');
            $("#med_add").val('');
            $(".error_med").hide();
        });

        $("#groups_plus").click(function () {
            $(".grp_add_class").slideToggle('medium');
            $("#grp_add").val('');
            $(".error_grp").hide();
        });

        $("#submit_med").click(function () {
            var item = $("#med_add").val();
            if (item.length == '') {
                $(".error_med").text('');
                $(".error_med").text('Item is Required');
                $(".error_med").show();
                $("#med_add").focus();
                return false;
            } else {
                $(".error_med").hide();
                $("#submit_med").text('Processing..');
                $("#submit_med").attr('disabled', 'disabled');
                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>admin_login/addMedicalHystory",
                    data: 'item=' + item,
                    success: function (msg) {
                        $("#submit_med").text('Add Item');
                        $("#submit_med").removeAttr('disabled');
                        $("#med_add").val('');
                        $(".med_add_class").hide();
                        if (msg != '') {
                            $("#each_med").html(msg);
                        } else {
                            alert('Item Not Added, Try again later.');
                        }
                    }
                });
            }
        });

        $("#submit_grp").click(function () {
            var item = $("#grp_add").val();
            if (item.length == '') {
                $(".error_grp").text('');
                $(".error_grp").text('Item is Required');
                $(".error_grp").show();
                $("#grp_add").focus();
                return false;
            } else {
                $(".error_grp").hide();
                $("#submit_grp").text('Processing..');
                $("#submit_grp").attr('disabled', 'disabled');
                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>admin_login/addGroups",
                    data: 'item=' + item,
                    success: function (msg) {
                        $("#submit_grp").text('Add Item');
                        $("#submit_grp").removeAttr('disabled');
                        $("#grp_add").val('');
                        $(".grp_add_class").hide();
                        if (msg != '') {
                            $("#each_grp").html(msg);
                        } else {
                            alert('Item Not Added, Try again later.');
                        }
                    }
                });
            }
        });
    });
</script>