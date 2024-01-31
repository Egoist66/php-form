class AbstractComponent {

    static connection = true

    constructor() {
        if (new.target === AbstractComponent) {
            throw new Error("Cannot instantiate abstract class Component");
        }
    }
    render() {
        throw new Error(`${this.render.name} method should be implemented!`)
    }

}

class Header extends AbstractComponent {
    html = ''

    constructor(html) {
        super()

        if(typeof html !== 'string'){
            throw new Error('Type Error! only string or null allowed!')
        }
        this.html = html
        
    }

    render() {
        return this.html
    }
}

const header = new Header(`<header>Hello header</header>`)

console.log(header.render(), header.id)

