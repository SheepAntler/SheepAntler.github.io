// package it up!
package java111.project5.labs;

/** The Snorkel class extends the BeachBag class and contains a single
 *  default construtor that outputs the name of the class
 *
 *  @author Elspeth Stalter-Clouse
 */
public class Snorkel extends DivingEquipment {

    /** This default constructor will output the name of the Snorkel class
     */
    public Snorkel() {
        System.out.println("Ahoy! I am a Snorkel! I live in "
                + getClass());
    }

}
