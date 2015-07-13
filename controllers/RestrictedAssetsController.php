<?php
namespace Craft;

class RestrictedAssetsController extends BaseController
{

	public function actionDownload()
	{
		$segments = craft()->request->segments;
		$file = craft()->assets->getFileById((int)end($segments));
		$user = craft()->userSession->getUser();

		if ($file && $user) {
	                $source = $file->getSource();
        	        $sourceType = $source->getSourceType();
               		$download = $sourceType->getLocalCopy($file);
			
			header('Content-type: '.$file->getMimeType());
			header('Content-Disposition: attachment; filename="'.$file->filename.'"');
			echo file_get_contents($download);
			IOHelper::deleteFile($download);
		} else {
			$this->redirect("404");
		}
	}
}
