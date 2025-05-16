<?php

namespace Aaran\Assets\Config;

class Application
{
    public const AppName = 'Codexsun';
    public const AppVersion = '1.0.0';
    public const AppCompanyName = 'Aaran Software';
    public const AppCompanyAddress_1 = 'No.7, Anjal Nagar';
    public const AppCompanyAddress_2 = '3rd Street';
    public const AppCompanyAddress_3 = 'Postal colony';
    public const AppCompanyAddress_4 = 'Tiruppur - 641602';
    public const AppCompanyAddress_5 = 'Tamilnadu, India';
    public const AppCompanyEmail = 'info@aaransofware.com';
    public const AppCompanyMobile = '+91 9655227767';
    public const AppTrialPeriod = '7- days';

    const VERSION = '1.0.0';

    public static function version(): string
    {
        return self::VERSION;
    }

}
