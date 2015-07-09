<?php
namespace Craft;

class RestrictedAssetsController extends BaseController
{

	protected $allowAnonymous = true;

	public function actionDownload()
	{
		$segments = craft()->request->segments;
		$file = craft()->assets->getFileById((int)end($segments));

		$source = $file->getSource();
		$sourceType = $source->getSourceType();
		$download = $sourceType->getLocalCopy($file);

		$user = craft()->userSession->getUser();
		if ($file && $user) {
			header('Content-type: '.$file->getMimeType());
			header('Content-Disposition: attachment; filename="'.$file->filename.'"');
			echo file_get_contents($download);
			IOHelper::deleteFile($download);
		} else {
			$this->redirect("404");
		}
	}
}
