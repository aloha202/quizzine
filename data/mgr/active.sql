INSERT INTO `page` (`id`, `name`, `content`, `is_module_page`, `module_name`, `is_content_editable`, `special_mark`, `is_redirect`, `redirect_route`, `redirect_timeout`, `layout`, `is_visible_for_admin`, `slug`, `meta_title`, `meta_description`, `meta_keywords`) VALUES (NULL, 'Thank you for your request', 'Thank you for your request, we\'ll get in touch with you sooon!', '0', NULL, '1', 'thank_you', '0', '/', '5', NULL, '1', NULL, NULL, NULL, NULL);
UPDATE `page` SET `slug` = 'thank-you' WHERE `page`.`id` = 32;