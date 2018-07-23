package requests

import kotlinx.serialization.*
import kotlinx.serialization.json.JSON

@Serializable
data class WeaponRowDTO(val rows: Array<WeaponDTO>, val id: Int)

@Serializable
data class WeaponDTO(val imageUrl: String, val title: String, val description: String)

object WeaponRawProcessing {
    fun getWeaponDTOs(rawData: String): WeaponRowDTO =  JSON.parse(rawData)
}