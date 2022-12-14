<?php

declare(strict_types=1);

namespace PackageVersions;

use Composer\InstalledVersions;
use OutOfBoundsException;

class_exists(InstalledVersions::class);

/**
 * This class is generated by composer/package-versions-deprecated, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 *
 * @deprecated in favor of the Composer\InstalledVersions class provided by Composer 2. Require composer-runtime-api:^2 to ensure it is present.
 */
final class Versions
{
    /**
     * @deprecated please use {@see self::rootPackageName()} instead.
     *             This constant will be removed in version 2.0.0.
     */
    const ROOT_PACKAGE_NAME = '__root__';

    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    const VERSIONS          = array (
  'amphp/amp' => 'v2.5.2@efca2b32a7580087adb8aabbff6be1dc1bb924a9',
  'amphp/byte-stream' => 'v1.8.0@f0c20cf598a958ba2aa8c6e5a71c697d652c7088',
  'amphp/cache' => 'v1.4.0@e7bccc526fc2a555d59e6ee8380eeb39a95c0835',
  'amphp/dns' => 'v1.2.3@852292532294d7972c729a96b49756d781f7c59d',
  'amphp/hpack' => 'v3.1.0@0dcd35f9a8d9fc04d5fb8af0aeb109d4474cfad8',
  'amphp/http' => 'v1.6.3@e2b75561011a9596e4574cc867e07a706d56394b',
  'amphp/http-client' => 'v4.5.5@ac286c0a2bf1bf175b08aa89d3086d1e9be03985',
  'amphp/parser' => 'v1.0.0@f83e68f03d5b8e8e0365b8792985a7f341c57ae1',
  'amphp/process' => 'v1.1.0@355b1e561b01c16ab3d78fada1ad47ccc96df70e',
  'amphp/serialization' => 'v1.0.0@693e77b2fb0b266c3c7d622317f881de44ae94a1',
  'amphp/socket' => 'v1.1.3@b9064b98742d12f8f438eaf73369bdd7d8446331',
  'amphp/sync' => 'v1.4.0@613047ac54c025aa800a9cde5b05c3add7327ed4',
  'amphp/windows-registry' => 'v0.3.3@0f56438b9197e224325e88f305346f0221df1f71',
  'api-platform/core' => 'v2.5.8@d4d6377d0340e7bb6081bd93ebaf93ad9ac803d6',
  'composer/package-versions-deprecated' => '1.11.99.1@7413f0b55a051e89485c5cb9f765fe24bb02a7b6',
  'daverandom/libdns' => 'v2.0.2@e8b6d6593d18ac3a6a14666d8a68a4703b2e05f9',
  'doctrine/annotations' => '1.11.1@ce77a7ba1770462cd705a91a151b6c3746f9c6ad',
  'doctrine/cache' => '1.10.2@13e3381b25847283a91948d04640543941309727',
  'doctrine/collections' => '1.6.7@55f8b799269a1a472457bd1a41b4f379d4cfba4a',
  'doctrine/common' => '3.1.0@9f3e3f3cc5399604c0325d5ffa92609d694d950d',
  'doctrine/dbal' => '2.12.1@adce7a954a1c2f14f85e94aed90c8489af204086',
  'doctrine/doctrine-bundle' => '2.2.2@044d33eeffdb236d5013b6b4af99f87519e10751',
  'doctrine/doctrine-migrations-bundle' => '3.0.1@96e730b0ffa0bb39c0f913c1966213f1674bf249',
  'doctrine/event-manager' => '1.1.1@41370af6a30faa9dc0368c4a6814d596e81aba7f',
  'doctrine/inflector' => '2.0.3@9cf661f4eb38f7c881cac67c75ea9b00bf97b210',
  'doctrine/instantiator' => '1.4.0@d56bf6102915de5702778fe20f2de3b2fe570b5b',
  'doctrine/lexer' => '1.2.1@e864bbf5904cb8f5bb334f99209b48018522f042',
  'doctrine/migrations' => '3.0.1@69eaf2ca5bc48357b43ddbdc31ccdffc0e2a0882',
  'doctrine/orm' => '2.8.1@242cf1a33df1b8bc5e1b86c3ebd01db07851c833',
  'doctrine/persistence' => '2.1.0@9899c16934053880876b920a3b8b02ed2337ac1d',
  'doctrine/sql-formatter' => '1.1.1@56070bebac6e77230ed7d306ad13528e60732871',
  'easycorp/easyadmin-bundle' => 'v3.1.6@1894c5901fd7d2b57c399f9a06c8b51422034949',
  'egulias/email-validator' => '2.1.24@ca90a3291eee1538cd48ff25163240695bd95448',
  'fig/link-util' => '1.1.1@c038ee75ca13663ddc2d1f185fe6f7533c00832a',
  'friendsofsymfony/ckeditor-bundle' => '2.2.0@7e1cfe2a83faba0be02661d44289d35e940bb5ea',
  'helios-ag/fm-elfinder-bundle' => '10.0.4@334dbd43623d34c962c2e9607565babede2e917a',
  'jms/metadata' => '2.4.0@491917b66b44deff7d1c320d35c1b92237083f67',
  'kelunik/certificate' => 'v1.1.2@56542e62d51533d04d0a9713261fea546bff80f6',
  'lcobucci/jwt' => '3.4.2@17cb82dd625ccb17c74bf8f38563d3b260306483',
  'league/uri' => '6.4.0@09da64118eaf4c5d52f9923a1e6a5be1da52fd9a',
  'league/uri-interfaces' => '2.2.0@667f150e589d65d79c89ffe662e426704f84224f',
  'league/uri-parser' => '1.4.1@671548427e4c932352d9b9279fdfa345bf63fa00',
  'lexik/jwt-authentication-bundle' => 'v2.10.3@1bc35b61963760007928de310ba408bfaa8bbd45',
  'monolog/monolog' => '2.1.1@f9eee5cec93dfb313a38b6b288741e84e53f02d5',
  'namshi/jose' => '7.2.3@89a24d7eb3040e285dd5925fcad992378b82bcff',
  'nelmio/cors-bundle' => '2.1.0@be4d5824caebc86da9e224e935e02e1201b3ea54',
  'nikic/php-parser' => 'v4.10.3@dbe56d23de8fcb157bbc0cfb3ad7c7de0cfb0984',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'phpdocumentor/reflection-common' => '2.2.0@1d01c49d4ed62f25aa84a747ad35d5a16924662b',
  'phpdocumentor/reflection-docblock' => '5.2.2@069a785b2141f5bcf49f3e353548dc1cce6df556',
  'phpdocumentor/type-resolver' => '1.4.0@6a467b8989322d92aa1c8bf2bebcc6e5c2ba55c0',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/event-dispatcher' => '1.0.0@dbefd12671e8a14ec7f180cab83036ed26714bb0',
  'psr/http-message' => '1.0.1@f6561bf28d520154e4b0ec72be95418abe6d9363',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.3@0f73288fd15629204f9d42b7055f72dacbe811fc',
  'sensio/framework-extra-bundle' => 'v5.6.1@430d14c01836b77c28092883d195a43ce413ee32',
  'studio-42/elfinder' => '2.1.57@087524b1d7a4d76cfd848dee2093cd8daf987f78',
  'swiftmailer/swiftmailer' => 'v6.2.4@56f0ab23f54c4ccbb0d5dcc67ff8552e0c98d59e',
  'symfony/apache-pack' => 'v1.0.1@3aa5818d73ad2551281fc58a75afd9ca82622e6c',
  'symfony/asset' => 'v5.1.9@19c59713f750642206b21a1edec5c18dea80f979',
  'symfony/cache' => 'v5.1.9@f81360f9acb25aa356bc662d8b32bfaa70d264a9',
  'symfony/cache-contracts' => 'v2.2.0@8034ca0b61d4dd967f3698aaa1da2507b631d0cb',
  'symfony/config' => 'v5.1.9@25fe2a2d023c38ade5dbc2d80679462592284ed5',
  'symfony/console' => 'v5.1.9@037b57ac42cafb64b7b55273fe1786f35d623077',
  'symfony/dependency-injection' => 'v5.1.9@8b2ec9f453430252379aea343d02ed3579b18b44',
  'symfony/deprecation-contracts' => 'v2.2.0@5fa56b4074d1ae755beb55617ddafe6f5d78f665',
  'symfony/doctrine-bridge' => 'v5.1.9@f8824e9c5adf3040fd64254e4d453fbc1bacf30c',
  'symfony/dotenv' => 'v5.1.9@264ca18dd6e4ab3cfa525ee52cceff9540a1019e',
  'symfony/error-handler' => 'v5.1.9@4be32277488607e38ad1108b08ca200882ef6077',
  'symfony/event-dispatcher' => 'v5.1.9@2c660884ec9413455af753515140ce696913693c',
  'symfony/event-dispatcher-contracts' => 'v2.2.0@0ba7d54483095a198fa51781bc608d17e84dffa2',
  'symfony/expression-language' => 'v5.1.9@54a17a1dbaef38408000daa9423cb1d3a5201900',
  'symfony/filesystem' => 'v5.1.9@bb92ba7f38b037e531908590a858a04d85c0e238',
  'symfony/finder' => 'v5.1.9@fd8305521692f27eae3263895d1ef1571c71a78d',
  'symfony/flex' => 'v1.11.0@ceb2b4e612bd0b4bb36a4d7fb2e800c861652f48',
  'symfony/form' => 'v5.1.9@56847a7c9df55341b6e99ec8ba8a097e9f66be73',
  'symfony/framework-bundle' => 'v5.1.9@d070863c197c6eb72ed3a54611b0a1bc5749ecc2',
  'symfony/http-client' => 'v5.1.9@8b236277f97be2f56f79330910ce372293fdc5b4',
  'symfony/http-client-contracts' => 'v2.3.1@41db680a15018f9c1d4b23516059633ce280ca33',
  'symfony/http-foundation' => 'v5.1.9@1e6e9e28369ddd3fd66ca14a469c21ae9b51969a',
  'symfony/http-kernel' => 'v5.1.9@2d0daaf17c9fe14eb3519b94b83d746554ecfd9c',
  'symfony/intl' => 'v5.1.9@eaac169bf64d307d48daef7e349729d670df6659',
  'symfony/mailer' => 'v5.1.9@a8be34b60e81c54f764f5ecee2a143b1dfbc60dc',
  'symfony/mime' => 'v5.1.9@698cab643bbb517a0d9d317e2ec9fc1636e97f1f',
  'symfony/monolog-bridge' => 'v5.1.9@763f8d9ca7e1e1a5be5cdda8a6702291825aff67',
  'symfony/monolog-bundle' => 'v3.6.0@e495f5c7e4e672ffef4357d4a4d85f010802f940',
  'symfony/notifier' => 'v5.1.9@7beeb0122548109126aa74f97b7d03c0f95e594d',
  'symfony/options-resolver' => 'v5.1.9@c6a02905e4ffc7a1498e8ee019db2b477cd1cc02',
  'symfony/polyfill-intl-grapheme' => 'v1.20.0@c7cf3f858ec7d70b89559d6e6eb1f7c2517d479c',
  'symfony/polyfill-intl-icu' => 'v1.20.0@c44d5bf6a75eed79555c6bf37505c6d39559353e',
  'symfony/polyfill-intl-idn' => 'v1.20.0@3b75acd829741c768bc8b1f84eb33265e7cc5117',
  'symfony/polyfill-intl-normalizer' => 'v1.20.0@727d1096295d807c309fb01a851577302394c897',
  'symfony/polyfill-mbstring' => 'v1.20.0@39d483bdf39be819deabf04ec872eb0b2410b531',
  'symfony/polyfill-php73' => 'v1.20.0@8ff431c517be11c78c48a39a66d37431e26a6bed',
  'symfony/polyfill-php80' => 'v1.20.0@e70aa8b064c5b72d3df2abd5ab1e90464ad009de',
  'symfony/polyfill-uuid' => 'v1.20.0@7095799250ff244f3015dc492480175a249e7b55',
  'symfony/process' => 'v5.1.9@b25b468538c82f6594058aabaa9bac48d7ef2170',
  'symfony/property-access' => 'v5.1.9@d979b802a230cce0e7ff0d60e643c5d74edb2daf',
  'symfony/property-info' => 'v5.1.9@5bc012adfe3d365db3cec3b050513950b19966b3',
  'symfony/routing' => 'v5.1.9@461b184cfe5c2e677bbd67761aa377914ab48a16',
  'symfony/security-bundle' => 'v5.1.9@1060810a1dc7361304c50d4aa2569fe5b4da60c6',
  'symfony/security-core' => 'v5.1.9@a6d771e97bf3886e3ff5bdcf93f358e81bd873b4',
  'symfony/security-csrf' => 'v5.1.9@d98a521e3c7ffa15c142e8b1e68a55fdeb58d4b7',
  'symfony/security-guard' => 'v5.1.9@e9d11fd6fcdb27ca5b83db44093289a1d6a3b771',
  'symfony/security-http' => 'v5.1.9@a3a65306b8bf48611bd85deec8acccd4e8bcae0b',
  'symfony/serializer' => 'v5.1.9@5bc62ff6cd4678363ae19a633667fd318b1a72f7',
  'symfony/service-contracts' => 'v2.2.0@d15da7ba4957ffb8f1747218be9e1a121fd298a1',
  'symfony/stopwatch' => 'v5.1.9@fcda7f14c3b39d33f9c788aea9afb1b5f5c288c6',
  'symfony/string' => 'v5.1.9@a97573e960303db71be0dd8fda9be3bca5e0feea',
  'symfony/swiftmailer-bundle' => 'v3.5.1@933be6a3196fb354615290f53ff7ff61e0bdde58',
  'symfony/translation' => 'v5.1.9@b52e4184a38b69148a2b129c77cf47b8ce61d23f',
  'symfony/translation-contracts' => 'v2.3.0@e2eaa60b558f26a4b0354e1bbb25636efaaad105',
  'symfony/twig-bridge' => 'v5.1.9@49a58af9f34ffcb11ef47d1ba1f8425396a6eac4',
  'symfony/twig-bundle' => 'v5.1.9@370bb30a9e8dc2b0c29791eec300b0b529bd783f',
  'symfony/uid' => 'v5.1.9@d6e033ed0eca26277084f76287c3322dc1d825c2',
  'symfony/validator' => 'v5.1.9@acf84937b932fe575e4e4892eecee5a6c5ca8b78',
  'symfony/var-dumper' => 'v5.1.9@006fc2312ee014e1ba46c01185423c010310d00f',
  'symfony/var-exporter' => 'v5.1.9@fbc3507f23d263d75417e09a12d77c009f39676c',
  'symfony/web-link' => 'v5.1.9@e805314ad8c4298d9bfc75335e35f83d6db2f43f',
  'symfony/yaml' => 'v5.1.9@bb73619b2ae5121bbbcd9f191dfd53ded17ae598',
  'twig/extra-bundle' => 'v3.1.1@a7c5799cf742ab0827f5d32df37528ee8bf5a233',
  'twig/twig' => 'v3.1.1@b02fa41f3783a2616eccef7b92fbc2343ffed737',
  'vich/uploader-bundle' => '1.16.0@efc28aed393c1a2cf5ab9fadc9f3183b19cd25ba',
  'webmozart/assert' => '1.9.1@bafc69caeb4d49c39fd0779086c03a3738cbb389',
  'willdurand/negotiation' => '3.0.0@04e14f38d4edfcc974114a07d2777d90c98f3d9c',
  'zendframework/zend-code' => '3.4.1@268040548f92c2bfcba164421c1add2ba43abaaa',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'doctrine/data-fixtures' => '1.4.4@16a03fadb5473f49aad70384002dfd5012fe680e',
  'doctrine/doctrine-fixtures-bundle' => '3.4.0@870189619a7770f468ffb0b80925302e065a3b34',
  'symfony/browser-kit' => 'v5.1.9@86aed11abd2a70f7f5694f639743ac9c1dbb8512',
  'symfony/css-selector' => 'v5.1.9@b8d8eb06b0942e84a69e7acebc3e9c1e6e6e7256',
  'symfony/debug-bundle' => 'v5.1.9@183a36bdb251eeeeff640ffbceea3403ac5c8d40',
  'symfony/dom-crawler' => 'v5.1.9@0969122fe144dd8ab2e8c98c7e03eedc621b368c',
  'symfony/maker-bundle' => 'v1.25.0@6d2da12632f5c8b9aa7b159f0bb46f245289434a',
  'symfony/phpunit-bridge' => 'v5.2.0@92a76ca5e64effd41ce111b8f476144dfa29f1f0',
  'symfony/web-profiler-bundle' => 'v5.1.9@2e18206d542245c8abbdad3270067aae9995dba7',
  'paragonie/random_compat' => '2.*@35b58e7bf3c415e45ef448d4445eafd1b581f05d',
  'symfony/polyfill-ctype' => '*@35b58e7bf3c415e45ef448d4445eafd1b581f05d',
  'symfony/polyfill-iconv' => '*@35b58e7bf3c415e45ef448d4445eafd1b581f05d',
  'symfony/polyfill-php72' => '*@35b58e7bf3c415e45ef448d4445eafd1b581f05d',
  'symfony/polyfill-php71' => '*@35b58e7bf3c415e45ef448d4445eafd1b581f05d',
  'symfony/polyfill-php70' => '*@35b58e7bf3c415e45ef448d4445eafd1b581f05d',
  'symfony/polyfill-php56' => '*@35b58e7bf3c415e45ef448d4445eafd1b581f05d',
  '__root__' => 'dev-master@35b58e7bf3c415e45ef448d4445eafd1b581f05d',
);

    private function __construct()
    {
    }

    /**
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function rootPackageName() : string
    {
        if (!class_exists(InstalledVersions::class, false) || !InstalledVersions::getRawData()) {
            return self::ROOT_PACKAGE_NAME;
        }

        return InstalledVersions::getRootPackage()['name'];
    }

    /**
     * @throws OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     * @psalm-pure
     *
     * @psalm-suppress ImpureMethodCall we know that {@see InstalledVersions} interaction does not
     *                                  cause any side effects here.
     */
    public static function getVersion(string $packageName): string
    {
        if (class_exists(InstalledVersions::class, false) && InstalledVersions::getRawData()) {
            return InstalledVersions::getPrettyVersion($packageName)
                . '@' . InstalledVersions::getReference($packageName);
        }

        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
