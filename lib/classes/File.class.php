<?php
    class File {
        public $targetDir;
        public $file;
        public $filePaths;
        public $fileOriginalName;
        public $prefix;
        
        /**
         * Saves the uploaded file to the target directory
         * Based on the optional parameter the upload might be renamed or keep its original name.
        */
        public function save() {
                /**
                 * Checks if the target directory exists
                 * Source: http://php.net/manual/en/function.mkdir.php
                 */
                if(!is_dir($this->targetDir)) {
                    mkdir($this->targetDir, 0777, true);
                }

                if($this->prefix != null) {
                    $fileName = md5($this->prefix.time());
                    move_uploaded_file($this->file['tmp_name'], $this->targetDir."/$fileName.jpg");
                    $this->filePaths["original"] = $this->targetDir."/$fileName.jpg";
                }else{
                    move_uploaded_file($this->file['tmp_name'], $this->targetDir."/$this->fileOriginalName");
                    $this->filePaths["original"] = $this->targetDir."/$this->fileOriginalName";
                }
                return true;
        }

        /**
         * Validates the file and return true or false
         */

        public function validate() {
            if($this->uploadSucceeded() && $this->fileSizeOk()) {
                return true;
            }
            return false;
        }

        /**
         * Checks for any error
         * Falls back with the error code for future proof if more errors get added
         */

        protected function uploadSucceeded() {

            if ($this->file['error'] !== UPLOAD_ERR_OK) {

                switch($this->file['error']) {

                    case 1:
                    case 2:
                        throw new Exception("Your upload has exceeded the server settings!");
                        break;
                    case 3:
                        throw new Exception("Your uploaded file was only partially uploaded.");
                        break;
                    case 4:
                        throw new Exception("No file was selected for upload.");
                        break;
                    case 6:
                    case 7:
                    case 8:
                        throw new Exception("The file couldn't be saved on our server.");
                        break;
                    default:
                        throw new Exception("Your upload has failed with error code " . $this->file['error']);

                }
                
            }

            return true;

        }

        /**
         * Checks if the size of the file isn't too big
         */

        protected function fileSizeOk() {
            $maxSize = 500000;
            if($fileSize = $this->file["size"] < $maxSize) {
                return true;
            }
            throw new Exception("File cannot be larger than ".($maxSize/1000)." k");
            return false;
        }

    }
?>