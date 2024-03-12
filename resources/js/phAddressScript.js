import { PhAddress } from 'ph-address';

(async () => {
    const phAddress = new PhAddress();
    const addressFinder = await phAddress.useSqlite();
    let addresses = await addressFinder.find('brgy 168');
    console.log(addresses);
})();