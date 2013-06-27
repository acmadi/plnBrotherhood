<?php
    /**
    * misal $tanggal = '2013-01-30'
    * panggil Tanggal::getTanggalLengkap($tanggal) keluarnya '30 Januari 2013'
    */
    class Tanggal extends CDateFormatter
    {

    	private static function ubahBahasa($eng) {
    		switch ($eng) {
    			case 'January': return 'Januari';
    			case 'February': return 'Februari';
    			case 'March': return 'Maret';
    			case 'May': return 'Mei';
    			case 'June': return 'Juni';
    			case 'July': return 'Juli';
    			case 'August': return 'Agustus';
    			case 'Oktober': return 'Oktober';
    			case 'Monday': return 'Senin';
    			case 'Tuesday': return 'Selasa';
    			case 'Wednesday': return 'Rabu';
    			case 'Thursday': return 'Kamis';
    			case 'Friday': return 'Jumat';
    			case 'Saturday': return 'Sabtu';
    			case 'Sunday': return 'Minggu';
    			default : return $eng;
    		}
    	}

        public static function getTanggal($date) {
        	return Yii::app()->dateFormatter->format('d', CDateTimeParser::parse($date, 'yyyy-MM-dd'));
        }

        public static function getTanggal0($date) {
        	return Yii::app()->dateFormatter->format('dd', CDateTimeParser::parse($date, 'yyyy-MM-dd'));
        }

        public static function getBulan($date) {
        	return Yii::app()->dateFormatter->format('M', CDateTimeParser::parse($date, 'yyyy-MM-dd'));
        }

        public static function getBulan0($date) {
        	return Yii::app()->dateFormatter->format('MM', CDateTimeParser::parse($date, 'yyyy-MM-dd'));
        }

        public static function getBulanA($date) {
        	return Tanggal::ubahBahasa(Yii::app()->dateFormatter->format('MMMM', CDateTimeParser::parse($date, 'yyyy-MM-dd')));
        }

        public static function getTahun($date) {
        	return Yii::app()->dateFormatter->format('yyyy', CDateTimeParser::parse($date, 'yyyy-MM-dd'));
        }

        public static function getTahun0($date) {
            return Yii::app()->dateFormatter->format('yy', CDateTimeParser::parse($date, 'yyyy-MM-dd'));
        }

        public static function getHari($date) {
        	return Tanggal::ubahBahasa(Yii::app()->dateFormatter->formatDayInWeek('EEEE', CDateTimeParser::parse($date, 'yyyy-MM-dd')));
        }

        public static function getTanggalSlash($date) {
            return Tanggal::getTanggal0($date) . '/' . Tanggal::getBulan0($date) . '/' . Tanggal::getTahun0($date);
        }

        public static function getTanggalLengkap($date) {
            return Tanggal::getTanggal($date) . ' ' . Tanggal::getBulanA($date) . ' ' . Tanggal::getTahun($date);
        }

        public static function getHariTanggalLengkap($date) {
        	return Tanggal::getHari($date) . ', ' . Tanggal::getTanggalLengkap($date);
        }
		
		public static function getJamMenit($time) {
			return Yii::app()->dateFormatter->format('HH:mm', CDateTimeParser::parse($time, 'HH:mm:ss'));
		}
		
    }
?>