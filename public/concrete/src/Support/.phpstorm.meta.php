<?php
namespace PHPSTORM_META;

// $app->make(SomeClass::class)
override(\Illuminate\Contracts\Container\Container::make(0), map([
  '' => '@',
  'config' => \Concrete\Core\Config\Repository\Repository::class,
  'config/database' => \Concrete\Core\Config\Repository\Repository::class,
  'Illuminate\Config\Repository' => \Concrete\Core\Config\Repository\Repository::class,
  'Concrete\Core\Localization\Translator\TranslatorAdapterFactoryInterface' => \Concrete\Core\Localization\Translator\Adapter\Core\TranslatorAdapterFactory::class,
  'Symfony\Component\EventDispatcher\EventDispatcherInterface' => \Symfony\Component\EventDispatcher\EventDispatcher::class,
  'director' => \Symfony\Component\EventDispatcher\EventDispatcher::class,
  'Concrete\Core\Routing\RouterInterface' => \Concrete\Core\Routing\Router::class,
  'helper/file' => \Concrete\Core\File\Service\File::class,
  'helper/concrete/file' => \Concrete\Core\File\Service\Application::class,
  'helper/image' => \Concrete\Core\File\Image\BasicThumbnailer::class,
  'helper/mime' => \Concrete\Core\File\Service\Mime::class,
  'helper/zip' => \Concrete\Core\File\Service\Zip::class,
  'image/gd' => \Imagine\Gd\Imagine::class,
  'image/thumbnailer' => \Concrete\Core\File\Image\BasicThumbnailer::class,
  'Concrete\Core\File\StorageLocation\StorageLocationInterface' => \Concrete\Core\Entity\File\StorageLocation\StorageLocation::class,
  'helper/encryption' => \Concrete\Core\Encryption\EncryptionService::class,
  'helper/validation/antispam' => \Concrete\Core\Antispam\Service::class,
  'helper/validation/captcha' => \Concrete\Core\Captcha\Service::class,
  'helper/validation/file' => \Concrete\Core\File\ValidationService::class,
  'helper/validation/form' => \Concrete\Core\Form\Service\Validation::class,
  'helper/validation/identifier' => \Concrete\Core\Utility\Service\Identifier::class,
  'helper/validation/ip' => \Concrete\Core\Permission\IPService::class,
  'helper/validation/numbers' => \Concrete\Core\Utility\Service\Validation\Numbers::class,
  'helper/validation/strings' => \Concrete\Core\Utility\Service\Validation\Strings::class,
  'helper/validation/banned_words' => \Concrete\Core\Validation\BannedWord\Service::class,
  'helper/security' => \Concrete\Core\Validation\SanitizeService::class,
  'captcha' => \Concrete\Core\Captcha\Service::class,
  'ip' => \Concrete\Core\Permission\IPService::class,
  'helper/validation/token' => \Concrete\Core\Validation\CSRF\Token::class,
  'helper/validation/error' => \Concrete\Core\Error\ErrorList\ErrorList::class,
  'token' => \Concrete\Core\Validation\CSRF\Token::class,
  'multilingual/interface/flag' => \Concrete\Core\Multilingual\Service\UserInterface\Flag::class,
  'multilingual/detector' => \Concrete\Core\Multilingual\Service\Detector::class,
  'multilingual/extractor' => \Concrete\Core\Multilingual\Service\Extractor::class,
  'helper/feed' => \Concrete\Core\Feed\FeedService::class,
  'helper/html' => \Concrete\Core\Html\Service\Html::class,
  'helper/lightbox' => \Concrete\Core\Html\Service\Lightbox::class,
  'helper/navigation' => \Concrete\Core\Html\Service\Navigation::class,
  'helper/seo' => \Concrete\Core\Html\Service\Seo::class,
  'html/image' => \Concrete\Core\Html\Image::class,
  'editor' => \Concrete\Core\Editor\CkeditorEditor::class,
  'helper/mail' => \Concrete\Core\Mail\Service::class,
  'mail' => \Concrete\Core\Mail\Service::class,
  'Zend\Mail\Transport\TransportInterface' => \Zend\Mail\Transport\Sendmail::class,
  'helper/concrete/asset_library' => \Concrete\Core\Application\Service\FileManager::class,
  'helper/concrete/file_manager' => \Concrete\Core\Application\Service\FileManager::class,
  'helper/concrete/composer' => \Concrete\Core\Application\Service\Composer::class,
  'helper/concrete/dashboard' => \Concrete\Core\Application\Service\Dashboard::class,
  'helper/concrete/dashboard/sitemap' => \Concrete\Core\Application\Service\Dashboard\Sitemap::class,
  'helper/concrete/ui' => \Concrete\Core\Application\Service\UserInterface::class,
  'helper/concrete/ui/menu' => \Concrete\Core\Application\Service\UserInterface\Menu::class,
  'helper/concrete/ui/help' => \Concrete\Core\Application\Service\UserInterface\Help::class,
  'helper/concrete/urls' => \Concrete\Core\Application\Service\Urls::class,
  'helper/concrete/user' => \Concrete\Core\Application\Service\User::class,
  'helper/concrete/validation' => \Concrete\Core\Application\Service\Validation::class,
  'helper/rating' => \Concrete\Attribute\Rating\Service::class,
  'helper/pagination' => \Concrete\Core\Legacy\Pagination::class,
  'help' => \Concrete\Core\Application\Service\UserInterface\Help::class,
  'help/core' => \Concrete\Core\Application\Service\UserInterface\Help\CoreManager::class,
  'help/dashboard' => \Concrete\Core\Application\Service\UserInterface\Help\DashboardManager::class,
  'help/block_type' => \Concrete\Core\Application\Service\UserInterface\Help\BlockTypeManager::class,
  'help/panel' => \Concrete\Core\Application\Service\UserInterface\Help\PanelManager::class,
  'error' => \Concrete\Core\Error\ErrorList\ErrorList::class,
  'environment' => \Concrete\Core\Foundation\Environment::class,
  'helper/concrete/avatar' => \Concrete\Core\Legacy\Avatar::class,
  'helper/text' => \Concrete\Core\Utility\Service\Text::class,
  'helper/arrays' => \Concrete\Core\Utility\Service\Arrays::class,
  'helper/number' => \Concrete\Core\Utility\Service\Number::class,
  'helper/xml' => \Concrete\Core\Utility\Service\Xml::class,
  'helper/url' => \Concrete\Core\Utility\Service\Url::class,
  'import/value_inspector/core' => \Concrete\Core\Backup\ContentImporter\ValueInspector\ValueInspector::class,
  'import/value_inspector' => \Concrete\Core\Backup\ContentImporter\ValueInspector\ValueInspector::class,
  'import/item/manager' => \Concrete\Core\Backup\ContentImporter\Importer\Manager::class,
  'manager/grid_framework' => \Concrete\Core\Page\Theme\GridFramework\Manager::class,
  'manager/view/pagination' => \Concrete\Core\Search\Pagination\View\Manager::class,
  'manager/view/pagination/pager' => \Concrete\Core\Search\Pagination\View\PagerManager::class,
  'manager/page_type/validator' => \Concrete\Core\Page\Type\Validator\Manager::class,
  'manager/page_type/saver' => \Concrete\Core\Page\Type\Saver\Manager::class,
  'manager/area_layout_preset_provider' => \Concrete\Core\Area\Layout\Preset\Provider\Manager::class,
  'manager/search_field/file' => \Concrete\Core\File\Search\Field\Manager::class,
  'manager/search_field/file_folder' => \Concrete\Core\File\Search\Field\FileFolderManager::class,
  'manager/search_field/page' => \Concrete\Core\Page\Search\Field\Manager::class,
  'manager/search_field/user' => \Concrete\Core\User\Search\Field\Manager::class,
  'manager/search_field/express' => \Concrete\Core\Express\Search\Field\Manager::class,
  'database' => \Concrete\Core\Database\DatabaseManager::class,
  'database/orm' => \Concrete\Core\Database\DatabaseManagerORM::class,
  'Doctrine\DBAL\Connection' => \Concrete\Core\Database\Connection\Connection::class,
  'Concrete\Core\Database\EntityManagerConfigFactoryInterface' => \Concrete\Core\Database\EntityManagerConfigFactory::class,
  'Concrete\Core\Database\EntityManagerFactoryInterface' => \Concrete\Core\Database\EntityManagerFactory::class,
  'Doctrine\ORM\EntityManagerInterface' => \Doctrine\ORM\EntityManager::class,
  'orm/cache' => \Concrete\Core\Cache\Adapter\DoctrineCacheDriver::class,
  'orm/cachedAnnotationReader' => \Doctrine\Common\Annotations\CachedReader::class,
  'orm/cachedSimpleAnnotationReader' => \Doctrine\Common\Annotations\CachedReader::class,
  'helper/form' => \Concrete\Core\Form\Service\Form::class,
  'helper/form/attribute' => \Concrete\Core\Form\Service\Widget\Attribute::class,
  'helper/form/color' => \Concrete\Core\Form\Service\Widget\Color::class,
  'helper/form/font' => \Concrete\Core\Form\Service\Widget\Typography::class,
  'helper/form/typography' => \Concrete\Core\Form\Service\Widget\Typography::class,
  'helper/form/date_time' => \Concrete\Core\Form\Service\Widget\DateTime::class,
  'helper/form/page_selector' => \Concrete\Core\Form\Service\Widget\PageSelector::class,
  'helper/form/rating' => \Concrete\Core\Form\Service\Widget\Rating::class,
  'helper/form/user_selector' => \Concrete\Core\Form\Service\Widget\UserSelector::class,
  'form/express/entry_selector' => \Concrete\Core\Form\Service\Widget\ExpressEntrySelector::class,
  'Concrete\Core\Session\SessionValidatorInterface' => \Concrete\Core\Session\SessionValidator::class,
  'Concrete\Core\Session\SessionFactoryInterface' => \Concrete\Core\Session\SessionFactory::class,
  'session' => \Symfony\Component\HttpFoundation\Session\Session::class,
  'cookie' => \Concrete\Core\Cookie\CookieJar::class,
  'helper/ajax' => \Concrete\Core\Http\Service\Ajax::class,
  'helper/json' => \Concrete\Core\Http\Service\Json::class,
  'Concrete\Core\Http\Middleware\StackInterface' => \Concrete\Core\Http\Middleware\MiddlewareStack::class,
  'Concrete\Core\Http\DispatcherInterface' => \Concrete\Core\Http\DefaultDispatcher::class,
  'Concrete\Core\Http\ServerInterface' => \Concrete\Core\Http\DefaultServer::class,
  'Concrete\Core\Http\ResponseFactoryInterface' => \Concrete\Core\Http\ResponseFactory::class,
  'http/client/curl' => \Concrete\Core\Http\Client\Client::class,
  'http/client/socket' => \Concrete\Core\Http\Client\Client::class,
  'Psr\Log\LoggerInterface' => \Concrete\Core\Logging\Logger::class,
  'log' => \Concrete\Core\Logging\Logger::class,
  'log/exceptions' => \Concrete\Core\Logging\Logger::class,
  'element' => \Concrete\Core\Filesystem\ElementManager::class,
  'manager/notification/types' => \Concrete\Core\Notification\Type\Manager::class,
  'manager/notification/subscriptions' => \Concrete\Core\Notification\Subscription\Manager::class,
  'cache' => \Concrete\Core\Cache\Level\ObjectCache::class,
  'cache/request' => \Concrete\Core\Cache\Level\RequestCache::class,
  'cache/expensive' => \Concrete\Core\Cache\Level\ExpensiveCache::class,
  'cache/overrides' => \Concrete\Core\Cache\Level\OverridesCache::class,
  'cache/page' => \Concrete\Core\Cache\Page\FilePageCache::class,
  'url/canonical/resolver' => \Concrete\Core\Url\Resolver\CanonicalUrlResolver::class,
  'url/canonical' => \Concrete\Core\Url\UrlImmutable::class,
  'url/resolver/path' => \Concrete\Core\Url\Resolver\PathUrlResolver::class,
  'url/resolver/page' => \Concrete\Core\Url\Resolver\PageUrlResolver::class,
  'url/resolver/route' => \Concrete\Core\Url\Resolver\RouterUrlResolver::class,
  'Concrete\Core\Url\Resolver\Manager\ResolverManagerInterface' => \Concrete\Core\Url\Resolver\Manager\ResolverManager::class,
  'url/manager' => \Concrete\Core\Url\Resolver\Manager\ResolverManager::class,
  'device/manager' => \Concrete\Core\Device\DeviceManager::class,
  'editor/image/extension/factory' => \Concrete\Core\ImageEditor\ExtensionFactory::class,
  'editor/image' => \Concrete\Core\ImageEditor\ImageEditor::class,
  'editor/image/core' => \Concrete\Core\ImageEditor\ImageEditor::class,
  'user/registration' => \Concrete\Core\User\RegistrationService::class,
  'user/avatar' => \Concrete\Core\User\Avatar\AvatarService::class,
  'user/status' => \Concrete\Core\User\StatusService::class,
  'Concrete\Core\User\RegistrationServiceInterface' => \Concrete\Core\User\RegistrationService::class,
  'Concrete\Core\User\StatusServiceInterface' => \Concrete\Core\User\StatusService::class,
  'Concrete\Core\User\Avatar\AvatarServiceInterface' => \Concrete\Core\User\Avatar\AvatarService::class,
  'Concrete\Core\Service\Manager\ManagerInterface' => \Concrete\Core\Service\Manager\ServiceManager::class,
  'site' => \Concrete\Core\Site\Service::class,
  'site/type' => \Concrete\Core\Site\Type\Service::class,
  'Concrete\Core\Site\Resolver\DriverInterface' => \Concrete\Core\Site\Resolver\StandardDriver::class,
  'Concrete\Core\Search\Index\IndexManagerInterface' => \Concrete\Core\Search\Index\DefaultManager::class,
  'oauth/factory/service' => \OAuth\ServiceFactory::class,
  'oauth/factory/extractor' => \OAuth\UserData\ExtractorFactory::class,
  'Concrete\Core\Validator\ValidatorManagerInterface' => \Concrete\Core\Validator\ValidatorManager::class,
  'validator/password' => \Concrete\Core\Validator\ValidatorManager::class,
  'manager/attribute/category' => \Concrete\Core\Attribute\Category\Manager::class,
  'express/builder/association' => \Concrete\Core\Express\ObjectAssociationBuilder::class,
  'express/control/type/manager' => \Concrete\Core\Express\Form\Control\Type\Manager::class,
  'express' => \Concrete\Core\Express\ObjectManager::class,
  'Concrete\Core\Express\Formatter\FormatterInterface' => \Concrete\Core\Express\Formatter\LabelFormatter::class,
  'Concrete\Core\Express\Entry\Formatter\EntryFormatterInterface' => \Concrete\Core\Express\Entry\Formatter\LabelFormatter::class,
  'Concrete\Core\Statistics\UsageTracker\TrackerManagerInterface' => \Concrete\Core\Statistics\UsageTracker\AggregateTracker::class,
  'statistics/tracker' => \Concrete\Core\Statistics\UsageTracker\AggregateTracker::class,
]));

// $app[SomeClass::class]
override(new \Illuminate\Contracts\Container\Container, map([
  '' => '@',
  'config' => \Concrete\Core\Config\Repository\Repository::class,
  'config/database' => \Concrete\Core\Config\Repository\Repository::class,
  'Illuminate\Config\Repository' => \Concrete\Core\Config\Repository\Repository::class,
  'Concrete\Core\Localization\Translator\TranslatorAdapterFactoryInterface' => \Concrete\Core\Localization\Translator\Adapter\Core\TranslatorAdapterFactory::class,
  'Symfony\Component\EventDispatcher\EventDispatcherInterface' => \Symfony\Component\EventDispatcher\EventDispatcher::class,
  'director' => \Symfony\Component\EventDispatcher\EventDispatcher::class,
  'Concrete\Core\Routing\RouterInterface' => \Concrete\Core\Routing\Router::class,
  'helper/file' => \Concrete\Core\File\Service\File::class,
  'helper/concrete/file' => \Concrete\Core\File\Service\Application::class,
  'helper/image' => \Concrete\Core\File\Image\BasicThumbnailer::class,
  'helper/mime' => \Concrete\Core\File\Service\Mime::class,
  'helper/zip' => \Concrete\Core\File\Service\Zip::class,
  'image/gd' => \Imagine\Gd\Imagine::class,
  'image/thumbnailer' => \Concrete\Core\File\Image\BasicThumbnailer::class,
  'Concrete\Core\File\StorageLocation\StorageLocationInterface' => \Concrete\Core\Entity\File\StorageLocation\StorageLocation::class,
  'helper/encryption' => \Concrete\Core\Encryption\EncryptionService::class,
  'helper/validation/antispam' => \Concrete\Core\Antispam\Service::class,
  'helper/validation/captcha' => \Concrete\Core\Captcha\Service::class,
  'helper/validation/file' => \Concrete\Core\File\ValidationService::class,
  'helper/validation/form' => \Concrete\Core\Form\Service\Validation::class,
  'helper/validation/identifier' => \Concrete\Core\Utility\Service\Identifier::class,
  'helper/validation/ip' => \Concrete\Core\Permission\IPService::class,
  'helper/validation/numbers' => \Concrete\Core\Utility\Service\Validation\Numbers::class,
  'helper/validation/strings' => \Concrete\Core\Utility\Service\Validation\Strings::class,
  'helper/validation/banned_words' => \Concrete\Core\Validation\BannedWord\Service::class,
  'helper/security' => \Concrete\Core\Validation\SanitizeService::class,
  'captcha' => \Concrete\Core\Captcha\Service::class,
  'ip' => \Concrete\Core\Permission\IPService::class,
  'helper/validation/token' => \Concrete\Core\Validation\CSRF\Token::class,
  'helper/validation/error' => \Concrete\Core\Error\ErrorList\ErrorList::class,
  'token' => \Concrete\Core\Validation\CSRF\Token::class,
  'multilingual/interface/flag' => \Concrete\Core\Multilingual\Service\UserInterface\Flag::class,
  'multilingual/detector' => \Concrete\Core\Multilingual\Service\Detector::class,
  'multilingual/extractor' => \Concrete\Core\Multilingual\Service\Extractor::class,
  'helper/feed' => \Concrete\Core\Feed\FeedService::class,
  'helper/html' => \Concrete\Core\Html\Service\Html::class,
  'helper/lightbox' => \Concrete\Core\Html\Service\Lightbox::class,
  'helper/navigation' => \Concrete\Core\Html\Service\Navigation::class,
  'helper/seo' => \Concrete\Core\Html\Service\Seo::class,
  'html/image' => \Concrete\Core\Html\Image::class,
  'editor' => \Concrete\Core\Editor\CkeditorEditor::class,
  'helper/mail' => \Concrete\Core\Mail\Service::class,
  'mail' => \Concrete\Core\Mail\Service::class,
  'Zend\Mail\Transport\TransportInterface' => \Zend\Mail\Transport\Sendmail::class,
  'helper/concrete/asset_library' => \Concrete\Core\Application\Service\FileManager::class,
  'helper/concrete/file_manager' => \Concrete\Core\Application\Service\FileManager::class,
  'helper/concrete/composer' => \Concrete\Core\Application\Service\Composer::class,
  'helper/concrete/dashboard' => \Concrete\Core\Application\Service\Dashboard::class,
  'helper/concrete/dashboard/sitemap' => \Concrete\Core\Application\Service\Dashboard\Sitemap::class,
  'helper/concrete/ui' => \Concrete\Core\Application\Service\UserInterface::class,
  'helper/concrete/ui/menu' => \Concrete\Core\Application\Service\UserInterface\Menu::class,
  'helper/concrete/ui/help' => \Concrete\Core\Application\Service\UserInterface\Help::class,
  'helper/concrete/urls' => \Concrete\Core\Application\Service\Urls::class,
  'helper/concrete/user' => \Concrete\Core\Application\Service\User::class,
  'helper/concrete/validation' => \Concrete\Core\Application\Service\Validation::class,
  'helper/rating' => \Concrete\Attribute\Rating\Service::class,
  'helper/pagination' => \Concrete\Core\Legacy\Pagination::class,
  'help' => \Concrete\Core\Application\Service\UserInterface\Help::class,
  'help/core' => \Concrete\Core\Application\Service\UserInterface\Help\CoreManager::class,
  'help/dashboard' => \Concrete\Core\Application\Service\UserInterface\Help\DashboardManager::class,
  'help/block_type' => \Concrete\Core\Application\Service\UserInterface\Help\BlockTypeManager::class,
  'help/panel' => \Concrete\Core\Application\Service\UserInterface\Help\PanelManager::class,
  'error' => \Concrete\Core\Error\ErrorList\ErrorList::class,
  'environment' => \Concrete\Core\Foundation\Environment::class,
  'helper/concrete/avatar' => \Concrete\Core\Legacy\Avatar::class,
  'helper/text' => \Concrete\Core\Utility\Service\Text::class,
  'helper/arrays' => \Concrete\Core\Utility\Service\Arrays::class,
  'helper/number' => \Concrete\Core\Utility\Service\Number::class,
  'helper/xml' => \Concrete\Core\Utility\Service\Xml::class,
  'helper/url' => \Concrete\Core\Utility\Service\Url::class,
  'import/value_inspector/core' => \Concrete\Core\Backup\ContentImporter\ValueInspector\ValueInspector::class,
  'import/value_inspector' => \Concrete\Core\Backup\ContentImporter\ValueInspector\ValueInspector::class,
  'import/item/manager' => \Concrete\Core\Backup\ContentImporter\Importer\Manager::class,
  'manager/grid_framework' => \Concrete\Core\Page\Theme\GridFramework\Manager::class,
  'manager/view/pagination' => \Concrete\Core\Search\Pagination\View\Manager::class,
  'manager/view/pagination/pager' => \Concrete\Core\Search\Pagination\View\PagerManager::class,
  'manager/page_type/validator' => \Concrete\Core\Page\Type\Validator\Manager::class,
  'manager/page_type/saver' => \Concrete\Core\Page\Type\Saver\Manager::class,
  'manager/area_layout_preset_provider' => \Concrete\Core\Area\Layout\Preset\Provider\Manager::class,
  'manager/search_field/file' => \Concrete\Core\File\Search\Field\Manager::class,
  'manager/search_field/file_folder' => \Concrete\Core\File\Search\Field\FileFolderManager::class,
  'manager/search_field/page' => \Concrete\Core\Page\Search\Field\Manager::class,
  'manager/search_field/user' => \Concrete\Core\User\Search\Field\Manager::class,
  'manager/search_field/express' => \Concrete\Core\Express\Search\Field\Manager::class,
  'database' => \Concrete\Core\Database\DatabaseManager::class,
  'database/orm' => \Concrete\Core\Database\DatabaseManagerORM::class,
  'Doctrine\DBAL\Connection' => \Concrete\Core\Database\Connection\Connection::class,
  'Concrete\Core\Database\EntityManagerConfigFactoryInterface' => \Concrete\Core\Database\EntityManagerConfigFactory::class,
  'Concrete\Core\Database\EntityManagerFactoryInterface' => \Concrete\Core\Database\EntityManagerFactory::class,
  'Doctrine\ORM\EntityManagerInterface' => \Doctrine\ORM\EntityManager::class,
  'orm/cache' => \Concrete\Core\Cache\Adapter\DoctrineCacheDriver::class,
  'orm/cachedAnnotationReader' => \Doctrine\Common\Annotations\CachedReader::class,
  'orm/cachedSimpleAnnotationReader' => \Doctrine\Common\Annotations\CachedReader::class,
  'helper/form' => \Concrete\Core\Form\Service\Form::class,
  'helper/form/attribute' => \Concrete\Core\Form\Service\Widget\Attribute::class,
  'helper/form/color' => \Concrete\Core\Form\Service\Widget\Color::class,
  'helper/form/font' => \Concrete\Core\Form\Service\Widget\Typography::class,
  'helper/form/typography' => \Concrete\Core\Form\Service\Widget\Typography::class,
  'helper/form/date_time' => \Concrete\Core\Form\Service\Widget\DateTime::class,
  'helper/form/page_selector' => \Concrete\Core\Form\Service\Widget\PageSelector::class,
  'helper/form/rating' => \Concrete\Core\Form\Service\Widget\Rating::class,
  'helper/form/user_selector' => \Concrete\Core\Form\Service\Widget\UserSelector::class,
  'form/express/entry_selector' => \Concrete\Core\Form\Service\Widget\ExpressEntrySelector::class,
  'Concrete\Core\Session\SessionValidatorInterface' => \Concrete\Core\Session\SessionValidator::class,
  'Concrete\Core\Session\SessionFactoryInterface' => \Concrete\Core\Session\SessionFactory::class,
  'session' => \Symfony\Component\HttpFoundation\Session\Session::class,
  'cookie' => \Concrete\Core\Cookie\CookieJar::class,
  'helper/ajax' => \Concrete\Core\Http\Service\Ajax::class,
  'helper/json' => \Concrete\Core\Http\Service\Json::class,
  'Concrete\Core\Http\Middleware\StackInterface' => \Concrete\Core\Http\Middleware\MiddlewareStack::class,
  'Concrete\Core\Http\DispatcherInterface' => \Concrete\Core\Http\DefaultDispatcher::class,
  'Concrete\Core\Http\ServerInterface' => \Concrete\Core\Http\DefaultServer::class,
  'Concrete\Core\Http\ResponseFactoryInterface' => \Concrete\Core\Http\ResponseFactory::class,
  'http/client/curl' => \Concrete\Core\Http\Client\Client::class,
  'http/client/socket' => \Concrete\Core\Http\Client\Client::class,
  'Psr\Log\LoggerInterface' => \Concrete\Core\Logging\Logger::class,
  'log' => \Concrete\Core\Logging\Logger::class,
  'log/exceptions' => \Concrete\Core\Logging\Logger::class,
  'element' => \Concrete\Core\Filesystem\ElementManager::class,
  'manager/notification/types' => \Concrete\Core\Notification\Type\Manager::class,
  'manager/notification/subscriptions' => \Concrete\Core\Notification\Subscription\Manager::class,
  'cache' => \Concrete\Core\Cache\Level\ObjectCache::class,
  'cache/request' => \Concrete\Core\Cache\Level\RequestCache::class,
  'cache/expensive' => \Concrete\Core\Cache\Level\ExpensiveCache::class,
  'cache/overrides' => \Concrete\Core\Cache\Level\OverridesCache::class,
  'cache/page' => \Concrete\Core\Cache\Page\FilePageCache::class,
  'url/canonical/resolver' => \Concrete\Core\Url\Resolver\CanonicalUrlResolver::class,
  'url/canonical' => \Concrete\Core\Url\UrlImmutable::class,
  'url/resolver/path' => \Concrete\Core\Url\Resolver\PathUrlResolver::class,
  'url/resolver/page' => \Concrete\Core\Url\Resolver\PageUrlResolver::class,
  'url/resolver/route' => \Concrete\Core\Url\Resolver\RouterUrlResolver::class,
  'Concrete\Core\Url\Resolver\Manager\ResolverManagerInterface' => \Concrete\Core\Url\Resolver\Manager\ResolverManager::class,
  'url/manager' => \Concrete\Core\Url\Resolver\Manager\ResolverManager::class,
  'device/manager' => \Concrete\Core\Device\DeviceManager::class,
  'editor/image/extension/factory' => \Concrete\Core\ImageEditor\ExtensionFactory::class,
  'editor/image' => \Concrete\Core\ImageEditor\ImageEditor::class,
  'editor/image/core' => \Concrete\Core\ImageEditor\ImageEditor::class,
  'user/registration' => \Concrete\Core\User\RegistrationService::class,
  'user/avatar' => \Concrete\Core\User\Avatar\AvatarService::class,
  'user/status' => \Concrete\Core\User\StatusService::class,
  'Concrete\Core\User\RegistrationServiceInterface' => \Concrete\Core\User\RegistrationService::class,
  'Concrete\Core\User\StatusServiceInterface' => \Concrete\Core\User\StatusService::class,
  'Concrete\Core\User\Avatar\AvatarServiceInterface' => \Concrete\Core\User\Avatar\AvatarService::class,
  'Concrete\Core\Service\Manager\ManagerInterface' => \Concrete\Core\Service\Manager\ServiceManager::class,
  'site' => \Concrete\Core\Site\Service::class,
  'site/type' => \Concrete\Core\Site\Type\Service::class,
  'Concrete\Core\Site\Resolver\DriverInterface' => \Concrete\Core\Site\Resolver\StandardDriver::class,
  'Concrete\Core\Search\Index\IndexManagerInterface' => \Concrete\Core\Search\Index\DefaultManager::class,
  'oauth/factory/service' => \OAuth\ServiceFactory::class,
  'oauth/factory/extractor' => \OAuth\UserData\ExtractorFactory::class,
  'Concrete\Core\Validator\ValidatorManagerInterface' => \Concrete\Core\Validator\ValidatorManager::class,
  'validator/password' => \Concrete\Core\Validator\ValidatorManager::class,
  'manager/attribute/category' => \Concrete\Core\Attribute\Category\Manager::class,
  'express/builder/association' => \Concrete\Core\Express\ObjectAssociationBuilder::class,
  'express/control/type/manager' => \Concrete\Core\Express\Form\Control\Type\Manager::class,
  'express' => \Concrete\Core\Express\ObjectManager::class,
  'Concrete\Core\Express\Formatter\FormatterInterface' => \Concrete\Core\Express\Formatter\LabelFormatter::class,
  'Concrete\Core\Express\Entry\Formatter\EntryFormatterInterface' => \Concrete\Core\Express\Entry\Formatter\LabelFormatter::class,
  'Concrete\Core\Statistics\UsageTracker\TrackerManagerInterface' => \Concrete\Core\Statistics\UsageTracker\AggregateTracker::class,
  'statistics/tracker' => \Concrete\Core\Statistics\UsageTracker\AggregateTracker::class,
]));
