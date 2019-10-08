/** This class represents a Name and its Looping method.
 *
 * @author Elspeth Stalter-Clouse
 */

public class NameLoop {
    // Instance variables
    String fullName;
    int loopCounter = 7;

    /** Run a loop 7 times that will result in the fullName
     *  variable printing to the page 7 times.
     */
    public void loopName() {
        while (loopCounter > 0) {
            System.out.println(fullName);

            loopCounter = loopCounter - 1;
        }
    }
}
