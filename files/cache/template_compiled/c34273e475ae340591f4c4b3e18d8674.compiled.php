<?php if(!defined("__XE__"))exit;?><script>
    <?php if ($__Context->is_register == 'Y'){ ?>
    alert("<?php echo $__Context->lang->msg_success_confirmed ?>");
    <?php }else{ ?>
    alert("<?php echo $__Context->lang->msg_success_authed ?>");
    <?php } ?>
    location.href="<?php echo getUrl() ?>";
</script>
