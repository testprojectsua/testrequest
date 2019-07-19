<?xml version = "1.0" encoding = "UTF-8"?>
<userInfo version="1.6">

    <returnCode><?php echo $this->data['code'] ?></returnCode>
    <returnCodeDescription><?php echo $this->data['status'] ?></returnCodeDescription>

	<?php if (isset($this->data['transaction'])): ?>
        <transactionId><?php echo $this->data['transaction']; ?></transactionId>
	<?php endif; ?>

	<?php if (isset($this->data['error'])): ?>
        <returnError><?php echo $this->data['error']; ?></returnError>
	<?php endif; ?>

</userInfo>