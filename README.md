Laravel Dotmailer
=================

A very basic Laravel wrapper for the [Dotmailer API Client by romanpitak](https://github.com/romanpitak/dotMailer-API-v2-PHP-client).

## Installation

To install, inside your project directory run the following from your terminal:

	composer require "industrious-mouse/laravel-dotmailer": "dev-master"

## Examples

### Adding a Contact with custom data fields.

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
	
### Sending a Campaign to a contact


	$contact_id = 12345;
	$campaign_id = 12345;

	$data = [
		'CampaignId'		=> $campaign_id,
		'ContactIds'		=> [
			$contact_id
		]
	];

	$send = Dotmailer::PostCampaignsSend(new ApiCampaignSend($data));

	try
	{
		$contact = Dotmailer::PostContacts($contact_data);
	}
	catch (Exception $e)
	{
		return $e;
	}

