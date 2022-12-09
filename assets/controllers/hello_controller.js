import { Controller } from '@hotwired/stimulus';
import {useDebounce} from "stimulus-use";

//let idTimeout = null

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    static targets = [ "name", "output","count" ]
    static debounces = ['handleChangeInput','handleWindowResize']

    connect() {
        super.connect();
        useDebounce(this,{wait:1000})
        window.addEventListener(
            'resize',this.handleWindowResize)
    }

    greet() {
        this.outputTarget.textContent =
            `Hello buddy, are you there, ${this.nameTarget.value}!`
    }

    increment(){
        let count = +this.countTarget.textContent;
        count++;
        this.countTarget.textContent=count;
    }

    /*this function is debounced*/
    handleChangeInput(e){
        console.log(e.target.value)
        /*
        if(idTimeout){
            clearTimeout(idTimeout)
        }

        const value = e.target.value;
        if(value.length === 0) return;

        idTimeout = setTimeout(()=>{
            this._fetch(e.target.value)
        },500)
        */
    }

    handleWindowResize(e){
        console.log(window.innerWidth);
        console.log(window.innerHeight);
    }
}

