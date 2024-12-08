<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\M_gudang; // Ensure this is correctly imported

class BaseController extends Controller
{
    protected $data = [];
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();

        if ($this->session->get('level') > 0) {
            $Sim = new \App\Models\M_gudang();

            if ($this->session->get('level') == "2") {
                $where = ['dokter.id_user' => $this->session->get('id')];
                $chelsica = $Sim->joinw('user', 'dokter', 'user.id_user=dokter.id_user', $where);
                $this->data['name'] = $chelsica->nama_d ?? $chelsica->username ?? 'Unknown';
                $this->data['foto'] = $chelsica->foto ?? 'default.jpg';
            } else {
                $where = ['id_user' => $this->session->get('id')];
                $chelsica = $Sim->getWhere('user', $where);
                $this->data['name'] = $chelsica->username ?? 'Unknown';
                $this->data['foto'] = $chelsica->foto ?? 'default.jpg';
            }
        } else {
            $this->data['name'] = 'Guest';
        }
    }

    /**
     * Instance of the main Request object.
     *
     * @var RequestInterface
     */
    protected $request;

    /**
     * Constructor.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param LoggerInterface   $logger
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
{
    parent::initController($request, $response, $logger);

    // Ensure 'name' is available in all views
    $this->data['header'] = view('header', ['name' => $this->data['name']]);
}
}