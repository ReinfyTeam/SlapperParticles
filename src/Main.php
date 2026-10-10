<?php

declare(strict_types=1);

namespace xqwtxon\SlapperParticlesV2;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
    protected function onLoad() : void{
        $this->saveResource("config.yml");
        $log = $this->getLogger();
        $config = $this->getConfig();
        $configVersion = $config->get("config-version");
        if (!is_string($configVersion) || $configVersion !== "1.0.2"){
            $dataFolder = rtrim($this->getDataFolder(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
            if(!rename($dataFolder . "config.yml", $dataFolder . "old-config.yml")){
                $log->error("Unable to preserve the old config.yml before migration.");
                return;
            }
            $log->notice("Your configuration is outdated! The configuration was renamed as old-config.yml");
            $this->saveResource("config.yml", true);
        } else {
            $this->saveDefaultConfig();
        }
    }
    public function onEnable() : void{
        $config = $this->getConfig();
        $log = $this->getLogger();
        $colorA = $config->get("Color A");
        $colorB = $config->get("Color B");
        $colorC = $config->get("Color C");
        $changed = false;
        if (!isset($colorA)) {
            $log->error("Color A is blank!");
            $log->notice("Color A modified to 255 as default.");
            $config->set("Color A", 255);
            $changed = true;
        }
        if (!isset($colorB)) {
            $log->error("Color B is blank!");
            $log->notice("Color B modified to 255 as default.");
            $config->set("Color B", 255);
            $changed = true;
        }
        if (!isset($colorC)) {
            $log->error("Color C is blank!");
            $log->notice("Color C modified to 255 as default.");
            $config->set("Color C", 255);
            $changed = true;
        }
        if($changed){
            $this->saveConfig();
        }
        $this->getScheduler()->scheduleRepeatingTask(new ParticleEffect($this), 2);
    }
}
