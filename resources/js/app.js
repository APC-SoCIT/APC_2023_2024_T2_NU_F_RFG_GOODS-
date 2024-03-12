import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

(async () => {
    const phAddress = new PhAddress();
    const addressFinder = await phAddress.useSqlite();
    let addresses = await addressFinder.find('brgy 168');
    console.log(addresses);
})();