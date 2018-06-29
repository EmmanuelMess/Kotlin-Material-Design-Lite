package components

import classType
import org.w3c.dom.Element
import kotlin.browser.document
import kotlin.dom.createElement

fun Element.fab(cssClassId: String = "", init: FloatingActionButton.() -> Unit): Element {
    val fab = FloatingActionButton(cssClassId)
    fab.init()
    return fab.mainElement
}

class FloatingActionButton(cssClassId: String = "") {

    val mainElement: Element

    init {
        mainElement = document.createElement("button") {
            this classType ("$cssClassId mdl-button mdl-js-button mdl-button--fab mdl-button--colored")
            append(document.createElement("i") {
                classType("material-icons")
                textContent = "add"
            })
        }
    }
}