<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log; 
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('devices.index', compact('devices'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'ip_address' => 'required|ip|unique:devices',
            'name' => 'required',
    
    ]);
       Device::create([
            'name' => $request->input('name'),           
            'ip_address' => $request->input('ip_address')
        ]);

        return redirect()->route('devices.index');
    }
    public function ping($id)
{
    try {
        $device = Device::findOrFail($id);
        $ip_address = $device-> ip_address;
        

        $command = "ping -n 4 $ip_address";

        $output = shell_exec("$command 2>&1");

        $output = mb_convert_encoding($output, 'UTF-8', 'UTF-8');

        Log::info("Выполняется ping для IP: $ip_address, вывод: $output");

        $is_online = false; 

        if (strpos($output, 'TTL') !== false) {
          
            $is_online = true; 
        } else if (strpos($output, 'timeout') !== false ||
                   strpos($output, 'Destination Host Unreachable') !== false ||
                   strpos($output, 'Request timed out') !== false ||
                   strpos($output, 'could not find') !== false) {
      
            $is_online = false; 
        } else {
            
            if (strpos($output, '0% packet loss') !== false) {
                
                $is_online = false; 
            }
        }

        return response()->json([
            
            'is_online' => $is_online,
            'ip_address' => $ip_address,
            'message' => $is_online ? 'Устройство в сети' : 'Устройство не в сети',
            'output' => $output     
        ]);
        
    } catch (\Exception $e) {
        Log::error('Ошибка при выполнении пинга: ' . $e->getMessage());
        return response()->json([
            'error' => 'Произошла ошибка: ' . $e->getMessage()
        ], 500);
    }
}

   
}