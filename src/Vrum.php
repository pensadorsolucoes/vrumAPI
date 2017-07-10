<?php
namespace VrumAPI;
/**
 * Olx API v1.
 *
 * TERMS OF USE:
 * - This code is in no way affiliated with, authorized, maintained, sponsored
 *   or endorsed by OLX or any of its affiliates or subsidiaries. This is
 *   an independent and unofficial API. Use at your own risk.
 * - We do NOT support or tolerate anyone who wants to use this API to send spam
 *   or commit other online crimes.
 *
 */

class Vrum
{

    /**
    * config to all requests
    *
    * @var array
    **/
    private static $cfg  = [];

	/**
	* use a 4 types of data
	* @var array
	*		 urlFile
	*		 ftp_server
    *        ftp_user_name
    *        ftp_user_pass
	**/
	public function __construct($data = null)
	{
		if(empty($data))
			throw new Exception("Empty data in __construct");

        self::$cfg['urlFile']  = $data['urlFile'];
        self::$cfg['ftp_server']     = $data['ftp_server'];
        self::$cfg['ftp_user_name']  = $data['ftp_user_name'];
        self::$cfg['ftp_user_pass']  = $data['ftp_user_pass'];
    }

    /**
     *
     * GET company file 
     *
     * @param string $companyName
     *
     * @return array
     */
    public function getFile($companyName)
    {
        $name = $this->formatString($companyName);
        $file = self::$cfg['urlFile'].$name.'.xml';

        if(!file_exists($file)){
            return [
                'status' => 'fail',
                'body' =>  'File not found'
            ];
        }


        $xml = simplexml_load_file($file);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
                var_dump($array);
        exit(0);
        
        return $xml;
    }

    /**
     *
     * GET car options 
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            'vea_airbagmotorista'        => 'Airbag Motorista',
            'vea_airbags'                => 'Airbag',
            'vea_alarme'                 => 'Alarme',
            'vea_alarmedistancia'        => 'Alarme a Distância', 
            'vea_arcondicionado'         => 'Ar Condicionado', 
            'vea_arquente'               => 'Ar Quente', 
            'vea_bancosdecouro'          => 'Bancos de Couro', 
            'vea_blindagem'              => 'Blindagem', 
            'vea_cdplayer'               => 'CD Player', 
            'vea_cdplayermp3'            => 'CD Player MP3', 
            'vea_computadordebordo'      => 'Computador de Bordo', 
            'vea_desembacadortraseiro'   => 'Desembarcador Traseiro', 
            'vea_direcaohidraulica'      => 'Direção Hidráulica', 
            'vea_disqueteira'            => 'Disqueteria', 
            'vea_dvd'                    => 'DVD', 
            'vea_espelhoseletricos'      => 'Espelhos Elétricos', 
            'vea_faroldeneblina'         => 'Farol de Neblina', 
            'vea_freiosabs'              => 'Freios ABS', 
            'vea_insulfilme'             => 'Insulfilme', 
            'vea_insulfilmeblindado'     => 'Insulfilme Blindado', 
            'vea_limpadortraseiro'       => 'Limpador Traseiro', 
            'vea_pilotoautomatico'       => 'Piloto Automático', 
            'vea_pneureserva0km'         => 'Pneu Reserva 0 KM', 
            'vea_protetordemotorecarter' => 'Protetor de Motor de Carter', 
            'vea_radioamfm'              => 'Radio AM FM', 
            'vea_rodasdeligaleve'        => "Rodas Liga Leve", 
            'vea_tetosolar'              => 'Teto Solar', 
            'vea_tocafitas'              => 'Toca Fitas', 
            'vea_travacentral'           => 'Trava Central', 
            'vea_travaeletrica'          => 'Trava Elétrica', 
            'vea_travamentoportas'       => 'Travamento Portas', 
            'vea_vidroeletrico'          => 'Vidro Elétricos', 
            'vea_vidrosverdes'           => 'Vidros Verdes'
        ];
    }

    /**
     *
     * GET kind cylinders 
     *
     * @return array
     */
    public function getCylinders(){
        return [
        '50cc', '60cc', '80cc', '85cc', '100cc', '125cc', '135cc', '150cc', '180cc', '200cc', '220cc', '250cc', '300cc', '350cc', '400cc', '420cc', '450cc', '500cc', '520cc', '570cc', '600cc', '620cc', '650cc', '750cc', '800cc', '820cc', '850cc', '900cc', '950cc', '1000cc', '1100cc', '1200cc', '1300cc', '1500cc', '1800cc'
        ];
    }

    /**
     *
     * GET motor options
     *
     * @return array
     */
    public function getMotor(){
        return ['1.0', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '1.9', '2.0', '2.2', '2.3', '2.4', '2.5', '2.8', '3.0', '3.2', '3.5', '3.8', '4.0', '4.1', '4.2', '4.3', '4.4', '4.5', '5.0', '5.5', '6.0' ];
    }

    /**
     *
     * GET kind Transmissions
     *
     * @return array
     */
    public function getTransmission(){
        return [ 'Manual','Automático', 'Tiptronic'];
    }

    /**
     *
     * GET kint type fuels
     *
     * @return array
     */
    public function getFuelType(){
        return ['Diesel','Etanol','Flex','Gasolina','GNV','Híbrido', 'Tetrafuel'];
    } 

    
     /**
     *
     * Post create a new car ad
     *
     * @param array
     *        company
     *        cnpj
     *        cars
     *            ad
     *            adpub
     *            city
     *            state
     *            year_maker
     *            year_model
     *            model
     *            model_base
     *            cody_model
     *            fuel_type
     *            motor
     *            gear
     *            color
     *            state_car
     *            km
     *            plate
     *            doors
     *            price   
     *            publicar preço
     *            Agência
     *            options
     *            photos
     *              
     *
     * @return void
     */
    public function postDeal($params)
    {
        $portal = new \SimpleXMLElement('<Megaportal></Megaportal>');
        $header = $portal->addChild('header');
        $header->addChild('Integradora', $params['company']);
        $header->addChild('CNPJ_CPF', $params['cnpj']);

        foreach ($params['cars'] as $value) {
            $car = $portal->addChild('veiculo');
            $ad = $car->addChild('AD');
            $ad->addAttribute('Id', $value['ad']);

            $advertiserInfo = $car->addChild('AdvertiserInfo');
            $advertiserInfo->addAttribute('CNPJ_CPF', $params['cnpj']);

            $adPub = $car->addChild('AdPub');
            $adPub->addAttribute('Edition', "WEB");
            $adPub->addAttribute('TextoAnuncio', $value['adpub']);

            $attributes = $car->addChild('Attributes');
            $attributes->addChild('cidade',            $value['city']);
            $attributes->addChild('estado',            $value['state']);
            $attributes->addChild('tipoveiculo',       'carro');
            $attributes->addChild('vea_fabricante',    $value['maker']);
            $attributes->addChild('vea_anofabricacao', $value['year_maker']);
            $attributes->addChild('vea_anomodelo',     $value['year_model']);
            $attributes->addChild('vea_modelo',        $value['model']);
            $attributes->addChild('vea_modelobase',    $value['model_base']);
            $attributes->addChild('vea_codigomodelo',  $value['cody_model']);
            $attributes->addChild('vea_combustivel',   $value['fuel_type']);
            $attributes->addChild('vea_motor',         $value['motor']);
            $attributes->addChild('vea_transmissao',   $value['gear']);
            $attributes->addChild('vea_cor',           $value['color']);
            $attributes->addChild('vea_estado',        $value['state_car']);
            $attributes->addChild('vea_kilometragem',  $value['km']);
            $attributes->addChild('vea_placa',         $value['plate']);
            $attributes->addChild('vea_portas',        $value['doors']);
            $attributes->addChild('preco',             $value['price']);
            $attributes->addChild('publicarpreco',     'publicar preço');
            $attributes->addChild('tipo',              'Agência');
            $attributes->addChild('vea_opcionais',     $value['options']);

            $multimidia = $car->addChild('Multimidia');
            $photos = $multimidia->addChild('Fotos');
            foreach ($value['photos'] as $val) {
                $photo = $photos->addChild('foto');
                $photo->addChild('url', $val);
            }

            $videos = $multimidia->addChild('videos');
            foreach ($value['videos'] as $val) {
                $video = $videos->addChild('video');
                $video->addChild('url', $val);
            }

        }

        // Header('Content-type: text/xml');
        // echo $portal->asXML();
        // exit(0);

        $xml = $portal->asXML();
        $this->saveFile($xml, $params['Integrator']);
    }

    /**
     *
     * Create file if doesn't exist, if it exists in the directory entered in the constructor only opens to change, the file has the
     * name of the organization, and inserts the elements passed by the parameter in the $xml variable.
     *
     * @param $xml - informations import 
     *         $companyName - file name
     *
     * @return void
     */
    public function saveFile($xml, $companyName)
    {
        $name = $this->formatString($companyName);
        $path = self::$cfg['urlFile'].$name.'.xml';

        if(file_exists($path)){
            $file = fopen($path, "r+");
            fwrite($file, $xml);
            fclose($file);
        } else{
            $file = fopen($path, "x+");
            fwrite($file, $xml);
            fclose($file);
        }
        $this->sendFile($path, $name);
    }


    /**
     *
     * send file by FTP Server
     *
     * @param $path - file directory
     *        $companyName - File name
     *
     * @return array
     */
    public function sendFile($path, $companyName)
    {
        $xml = simplexml_load_file($path);
        $remote_file = $companyName;

        $conn_id = ftp_connect(self::$cfg['ftp_server']);
        $login_result = ftp_login($conn_id, self::$cfg['ftp_user_name'], self::$cfg['ftp_user_pass']);

        if (ftp_put($conn_id, $remote_file, $path, FTP_ASCII)) {
            return [
                'status' => 'ok',
                'body' => 'successfully uploaded xml file'
            ];
        
        }
        else {
            return [
                'status' => 'fail',
                'body' =>  'There was a problem while uploading xml file'
            ];
        }

        ftp_close($conn_id);
    }

    /**
     *
     * Treats name company, removes spaces, special characters.
     *
     * @param $param - company name
     *
     * @return string
     */
    public function formatString($param)
    {
        $param = preg_replace('/á|à|â|ã|ä/', 'a', $param);
        $param = preg_replace("/Á|À|Â|Ã|Ä/", "A", $param);
        $param = preg_replace("/é|è|ê/", "e", $param);
        $param = preg_replace("/É|È|Ê/", "E", $param);
        $param = preg_replace("/í|ì/", "i", $param);
        $param = preg_replace("/Í|Ì/", "I", $param);
        $param = preg_replace("/ó|ò|ô|õ|ö/", "o", $param);
        $param = preg_replace("/Ó|Ò|Ô|Õ|Ö/", "O", $param);
        $param = preg_replace("/ú|ù|ü/", "u", $param);
        $param = preg_replace("/Ú|Ù|Ü/", "U", $param);
        $param = preg_replace("/ç/", "c", $param);
        $param = preg_replace("/Ç/", "C", $param);
        $param = preg_replace("/[][><}{)(:;,!?*%~^`@]/", "", $param);
        $param = preg_replace("/ /", "_", $param);
        return $param;
    }

}