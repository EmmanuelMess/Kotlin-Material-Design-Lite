package site.pages.forumspage

import components.*
import components.layout.Grid
import components.layout.grid
import components.layout.navigationlayout.MdlContent
import components.layout.navigationlayout.content
import div
import header
import mdlApp
import site.Color
import kotlin.dom.appendElement

object Forums : MdlContent {
    fun createPage() {
        val mdlApp = mdlApp {
            navigationLayout(Forums, "layout") {
                header(Color.primary) {
                }
                drawer("drawer") {
                    mainElement.header("drawer-header") {
                        setAttribute("style", " background: url('frontend/assets/images/icon.jpg') center / cover; padding: 10px;")
                    }

                    nav("navigation") {
                        link {
                            text = "Pagina principal"
                            materialIcons = "forum"
                            href = "index.php"
                        }
                        link {
                            text = "Ingresar"
                            materialIcons = "account_circle"
                            onClick {
                                dialog {
                                    title = "Ingresar"
                                    buttonSecondary = Dialog.Button()
                                }
                            }
                        }
                        link {
                            text = "Acerca de"
                            materialIcons = "info"
                            onClick {
                                dialog {
                                    title = "Acerca de"
                                    content = "Emmanuel Messulam"
                                    buttonSecondary = Dialog.Button()
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    override val content = content("Foros") {
        grid {
            createX(Array(2) {
                MainPageCard("Tema",
                        """
                        Aca va una corta explicacion sobre
                        la cosa que se va a hablar pero necesito
                        que este texto sea mas largo una linea
                        mas va a bastar creo
                        """)
            })

            cellCard(4) {
                size()
                title = "Añadir tema"
                supportingText = "Aca va una corta explicacion sobre la cosa que se va a hablar pero necesito que este texto sea mas largo una linea mas va a bastar creo"
                button = Card.Button("sdfsdf", Color.accent) {
                    dialog {
                        title = "Nuevo"
                        htmlContent = div {
                            innerHTML = """
                                 <form action="/nuevotema.php" method="get">
                                      Tema:${'\n'}<input type="text" name="tema"><br>
                                      Descripción:${'\n'}<input type="text" name="desc"><br>
                                      <input type="submit" value="Enviar">
                                 </form>
                                """
                        }
                        //buttonSecondary = Dialog.Button()
                        //buttonPrimary = Dialog.Button("Añadir", false, "nuevotema.php?tema=",
                        //        color = Color.accent)
                    }
                }
            }
        }
    }

    private fun Grid.createX(mainPageCards: Array<MainPageCard>) {
        for (mainPageCard in mainPageCards) {
            cellCard(4) {
                size()
                title = mainPageCard.title
                supportingText = mainPageCard.supportingText
            }
        }
    }

    private data class MainPageCard(val title: String, val supportingText: String)

}

