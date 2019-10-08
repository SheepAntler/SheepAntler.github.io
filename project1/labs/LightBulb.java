/**
 *  The Light Bulb class that is part of lab 4
 *
 * @author    eknapp
 */
public class LightBulb {

    boolean on = false;

    /**
     *  Turn on the light bulb
     */
    public void turnOn() {
        on = true;
        System.out.println("Ok, now I'm on.");
    }

    public void turnOff() {
        on = false;
        System.out.println("Ok, now I'm off.");
    }
}
