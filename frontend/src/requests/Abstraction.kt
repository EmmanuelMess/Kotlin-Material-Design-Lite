package requests

import org.w3c.xhr.XMLHttpRequest

object Requestables {
    fun requestWeapons(id: Int, amount: Int)
            = "backend/request_weapons.php?id=$id&amount=$amount"
}

object RawRequestData {
    fun getWeaponsRaw(id: Int, amount: Int, callback: (String) -> Unit, error: (XMLHttpRequest) -> Unit = {}) {
        CommonDataRequest.makeAsyncRequest("GET", Requestables.requestWeapons(id, amount), {
            callback(responseText)
        }, error)
    }
}

object Requests {
    fun getWeapons(id: Int, amount: Int, callback: (WeaponRowDTO) -> Unit, error: (XMLHttpRequest) -> Unit = {}) {
        RawRequestData.getWeaponsRaw(id, amount, {
            callback(WeaponRawProcessing.getWeaponDTOs(it))
        }, error)
    }
}