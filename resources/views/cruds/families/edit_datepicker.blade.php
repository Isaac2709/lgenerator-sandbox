
<!--datepicker Script -->
<?php
$set_lang=Lang::getLocale();
if ($set_lang=='ar'){$set_lang='es';} 
?>
<script type="text/javascript">
    $('.date_of_birth').datepicker({
        language:  '<?php echo $set_lang;?>',
        format: 'yyyy-mm-dd',        
        todayBtn: 1,
        todayHighlight: 1,
        showMeridian: 1,
        autoclose: 1
    });


</script>
<!--end datepicker Script -->
