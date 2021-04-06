<?php

/**
 * Mail class
 *
 * @author McArrow
 */
class ivMail
{
	/**
	 * Email body
	 * @access private
	 * @var string
	 */
	var $_body = '';

	/**
	 * Array of recipients
	 * @access private
	 * @var array
	 */
	var $_to = array();
	
	/**
	 * Sender name and email 
	 * @access private
	 * @var array
	 */
	var $_from = null;

	/**
	 * Email subject
	 * @access private
	 * @var string
	 */
	var $_subject = '';

	/**
	 * Returns email body
	 *
	 * @return string
	 */
	function getBody()
	{
		return $this->_body;
	}

	/**
	 * Sets email body
	 *
	 * @param string $body
	 */
	function setBody($body)
	{
		$this->_body = $body;
	}

	/**
	 * Returns recipients
	 *
	 * @return array
	 */
	function getTo()
	{
		return $this->_to;
	}

	/**
	 * Adds recipient
	 *
	 * @param string $email
	 * @param string $name
	 */
	function addTo($email, $name = '')
	{
		$this->_to[$email] = $name;
	}

	/**
	 * Clears recipients
	 *
	 */
	function clearTo()
	{
		$this->_to = array();
	}

	/**
	 * Returns sender
	 *
	 * @return array|null
	 */
	function getFrom()
	{
		return $this->_from;
	}
	
	/**
	 * Sets sender
	 *
	 * @param string $email
	 * @param string $name
	 */
	function setFrom($email, $name = '')
	{
		if (is_null($this->_from)) {
			$this->_from = array('name' => $name, 'email' => $email);
		} else {
			trigger_error('From field setted twice', E_USER_ERROR);
		}
	}
	
	/**
	 * Returns email subject
	 *
	 * @return string
	 */
	function getSubject()
	{
		return $this->_subject;
	}

	/**
	 * Sets email subject
	 *
	 * @param string $subject
	 */
	function setSubject($subject)
	{
		$this->_subject = $subject;
	}

	/**
	 * Sends email
	 *
	 * @return boolean Operation status
	 */
	function send()
	{
		$from = $this->getFrom();
		if (is_null($from)) {
			trigger_error('From field not setted', E_USER_ERROR);
		}

		$smf = @ini_set('sendmail_from', $from['email']);
		$fromHeader = "=?UTF-8?B?" . base64_encode($from['name']) . "?= <{$from['email']}>";
		$headers = "From: $fromHeader\n" .
			"Reply-To: {$from['email']}\n" .
			"Content-type: text/html; charset=UTF-8\n";

		$result = true;
		foreach ($this->getTo() as $toEmail => $toName) {
			$result &= @mail($toEmail, $this->getSubject(), $this->getBody(), $headers);
		}

		@ini_set('sendmail_from', $smf);

		return $result;
	}

}
?>