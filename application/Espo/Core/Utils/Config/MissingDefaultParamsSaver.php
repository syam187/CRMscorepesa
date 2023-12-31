<?php
/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2023 Yurii Kuznietsov, Taras Machyshyn, Oleksii Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/

namespace Espo\Core\Utils\Config;

use Espo\Core\Utils\Config;
use Espo\Core\Utils\File\Manager as FileManager;

use RuntimeException;

class MissingDefaultParamsSaver
{
    private Config $config;

    private ConfigWriter $configWriter;

    private FileManager $fileManager;

    private string $defaultConfigPath = 'application/Espo/Resources/defaults/config.php';

    public function __construct(Config $config, ConfigWriter $configWriter, FileManager $fileManager)
    {
        $this->config = $config;
        $this->configWriter = $configWriter;
        $this->fileManager = $fileManager;
    }

    public function process(): void
    {
        $data = $this->fileManager->getPhpSafeContents($this->defaultConfigPath);

        if (!is_array($data)) {
            throw new RuntimeException();
        }

        /** @var array<string,mixed> $data */

        $newData = [];

        foreach ($data as $param => $value) {
            if ($this->config->has($param)) {
                continue;
            }

            $newData[$param] = $value;
        }

        if (!count($newData)) {
            return;
        }

        $this->configWriter->setMultiple($newData);
        $this->configWriter->save();
    }
}
