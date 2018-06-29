package components.layout.navigationlayout

import components.FloatingActionButton
import components.MdlComponent
import org.w3c.dom.Element

fun content(title: String, fab: FloatingActionButton? = null, cssClassId: String = "", body: Element.() -> Unit)
        = Content(title, fab, cssClassId, body)

class Content(val title: String, fab: FloatingActionButton? = null, cssClassId: String = "", body: Element.() -> Unit)
    : MdlComponent("div", "mdl-layout__content", cssClassId) {

    init {
        mainElement.body()
        if(fab != null) {
            mainElement.append(fab.mainElement)
        }
    }
}

interface MdlContent {
    val content: Content
}



