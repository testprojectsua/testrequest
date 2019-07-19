{
    "SubmitDataResult":"<?php echo $this->data['status'];?>"
<?php if(isset($this->data['error'])):?>
    ,"SubmitDataErrorMessage": "<?php echo $this->data['error'];?>"
<?php endif;?>
}