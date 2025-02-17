# CHANGELOG

## NEXT

-   Minimum PHP version was bumped to 8.0 so that PHP 8 attributes could be used.

-   The `LiveComponentInterface` was dropped and replaced by the `AsLiveComponent` attribute,
    which extends the new `AsTwigComponent` from the TwigComponent library. All
    other annotations (e.g. `@LiveProp` and `@LiveAction`) were also replaced by
    PHP 8 attributes.

Before:

```php
use App\Entity\Notification;
use App\Repository\NotificationRepository;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\LiveComponentInterface;

final class NotificationComponent implements LiveComponentInterface
{
    private NotificationRepository $repo;

    /** @LiveProp */
    public bool $expanded = false;

    public function __construct(NotificationRepository $repo)
    {
        $this->repo = $repo;
    }

    /** @LiveAction */
    public function toggle(): void
    {
        $this->expanded = !$this->expanded;
    }

    public function getNotifications(): array
    {
        return $this->repo->findAll();
    }

    public static function getComponentName(): string
    {
        return 'notification';
    }
}
```

After:

```php
use App\Entity\Notification;
use App\Repository\NotificationRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;

#[AsLiveComponent('notification')]
final class NotificationComponent
{
    private NotificationRepository $repo;

    #[LiveProp]
    public bool $expanded = false;

    public function __construct(NotificationRepository $repo)
    {
        $this->repo = $repo;
    }

    #[LiveAction]
    public function toggle(): void
    {
        $this->expanded = !$this->expanded;
    }

    public function getNotifications(): array
    {
        return $this->repo->findAll();
    }
}
```

## Pre-Release

-   The LiveComponent library was introduced!
