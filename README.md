# CodeIgniter 4 Framework

## What is CodeIgniter?

netsh wlan show profile **listar las redes wifi que la PC tiene guardadas**



use App\Models\deviceModel;

Class {
    private $deviceModel;
    
    public function __construct(){
        $this->deviceModel = new deviceModel();
    }

    public function ejemplo(){
        $device = $this->deviceModel->find(1);
        return $device;
    }

    public function ejemplo2(){
        $device = $this->deviceModel->insert(['id_dispositivo' => $id_dispositivo]);
    }
}