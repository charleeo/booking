<<?php

$editVerifiedBusiness = new User();
$business_info = $editVerifiedBusiness->getUserInfo(is_logged_in());
$business_id = $business_info['business_id'];