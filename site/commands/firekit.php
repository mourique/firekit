<?php

return [
    'description' => 'The Firekit Toobelt',
    'args' => [
        'subcommand' => [
            'description' => 'The specific Firekit command',
        ]
    ],
    'command' => static function ($cli): void {
        $projectname = basename(getcwd());
        $gitconfig = parse_ini_file('.git/config', true);
        if ($cli->arg('subcommand') == "info") {
            $cli->br();
            $cli->out("🔥 Firekit Info");
            $cli->br();
            $cli->out("Projectname: " . $projectname);
            $cli->out("Public URL: firekit.felixf.de");
            $cli->br();
            $cli->out("✅ Deploy with gitFTP");
            $cli->out("✅ Pull content with rsync");
            $cli->out("✅ Cronjob Backups");
            /*	$cli->out(print_r($gitconfig));*/
        } else {
            $cli->br();
            $cli->out("🔥 Firekit Toolbelt");
            $cli->br();
            $cli->error("use one of the following subcommands: ");
            $cli->out("- info");
        }
    }
];
