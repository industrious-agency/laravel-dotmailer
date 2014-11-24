Laravel Dotmailer
=================

A very basic Laravel wrapper for the [Dotmailer API Client by romanpitak](https://github.com/romanpitak/dotMailer-API-v2-PHP-client).

## Example 1

	$contact_data = new ApiContact([
		'email'			=> 'test@test.com',
		'emailType'		=> 'Html',
		'dataFields'	=> [
			[
				'key' => 'FIRSTNAME',
				'value' => 'Name'
			]
		]
	]);

	try
	{
		$contact = Dotmailer::PostContacts($contact_data);
	}
	catch (Exception $e)
	{
		return $e;
	}

