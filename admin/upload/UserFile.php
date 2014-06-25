<?php

/**
 * Cuida dos uploads do site
 *
 * @author apssouza
 */
class UserFile {

    const folderTemp = 'temp/';
    
    public function getNewName($oldName) {
        $aName = explode('.', $oldName);
        $ext = end($aName);
        return date('YmdHis') . rand(0, 1000) . '.' . $ext;
    }

    public function move($temp, $destination) {
        if (copy($temp, $destination)) {
            unlink($temp);
            return true;
        }

        return false;
    }

    /**
     * Recebe o upload da ferramenta jquery upload e move para uma pasta temporaria
     */
    public function upload() {
        $name = is_array($_FILES['files']['name']) ? $_FILES['files']['name'][0] : $_FILES['files']['name'];
        $temp = is_array($_FILES['files']['tmp_name']) ? $_FILES['files']['tmp_name'][0] : $_FILES['files']['tmp_name'];
        $newName = $this->getNewName($name);
        $destination = self::folderTemp . $newName;

        if (!is_dir(self::folderTemp)) {
            $aFolders = explode('/', self::folderTemp);
            $sFolds = '';
            foreach ($aFolders as $value) {
                $sFolds .= $value;
                if (!is_dir(self::folderTemp)) {
                    mkdir($sFolds);
                }
            }
        }

        if (move_uploaded_file($temp, $destination)) {
            if ($this->isImage($destination)) {
                //$this->createThumb($destination);
            }
            return $this->getResponse($newName);
        } else {
            return $this->getResponse($newName, 'Erro ao salvar o arquivo.');
        }
    }

    public function createThumb($img) {
        $image = new ImageEdit($img);
        $image->resizeAndCrop(300, 300);
        $image->getOutputImage(self::folderTemp . 't_' . end(explode('/', $img)));
    }

    public function isImage($file) {
        if (preg_match('/\.[jJpPgG][pPiInN][gGgG]$/', $file)) {
            return true;
        }
    }

    public function save($destination, $filetemp = null) {
        if (!$filetemp) {
            $aName = explode('/', $destination);
            $filetemp = end($aName);
        }
        $pathUpload = __DIR__ . '/';
        $temp = $pathUpload . self::folderTemp . $filetemp;
        
        if(!file_exists($temp)){return false;}

        if ($this->move($temp, $destination)) {
            $this->clearFolderTemp($pathUpload);
            return true;
        }
        return false;
    }

    public function clearFolderTemp($pathUpload) {
        $files = scandir($pathUpload . self::folderTemp);
        $currentTime = time();
        $past = 86400; //um dia at�s
        foreach ($files as $filename) {
            $filename = self::folderTemp . $filename;
            if (file_exists($filename)) {
                if (filemtime($filename) < ($currentTime - $past)) {
                    @unlink($filename);
                }
            }
        }
    }

    private function getResponse($name, $erro = '') {
        $response = array(
            'name' => $name
        );

        if ($erro) {
            $response['error'] = $erro;
        }

        return json_encode($response);
    }

    /**
     * Realiza o download de um arquivo para o servidor
     */
    public static function download($remoteFile, $savePath) {
        $aName = explode('/', $remoteFile);
        $filename = end($aName);
        if (!ini_get('allow_url_fopen')) {
            ini_set("allow_url_fopen", true);
        }
        $ctx = stream_context_create(array('http' => array('timeout' => 60)));
        $sImagem = file_get_contents($remoteFile, 0, $ctx);
        $hndSave = fopen($savePath . $filename, "w");
        fwrite($hndSave, $sImagem);
        fclose($hndSave);
        return $filename;
    }

}

?>
