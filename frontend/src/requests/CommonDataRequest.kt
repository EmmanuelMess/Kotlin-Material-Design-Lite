package requests

import org.w3c.xhr.XMLHttpRequest

object CommonDataRequest {
    fun makeAsyncRequest(method: String, requestFile: String, callback: XMLHttpRequest.() -> Unit,
                         error: XMLHttpRequest.() -> Unit = {}) {
        val request = XMLHttpRequest()
        request.onreadystatechange = {
            if(request.readyState == XMLHttpRequest.DONE) {
                if(request.status == 200.toShort()) {
                    callback(request)
                } else {
                    error(request)
                }
            }
        }
        request.open(method, requestFile, true)
        request.send()
    }
}