ALTER TABLE `property_enquiry` ADD `updated_at` DATE NULL AFTER `user_type`;
ALTER TABLE `property_enquiry` ADD `created_at` DATE NULL AFTER `updated_at`;
