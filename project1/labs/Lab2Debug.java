
/**
 *  Lab 2 Debugging exercise
 *
 *@author Elspeth Stalter-Clouse
 */
public class Lab2Debug {

    /**
     *  The main method for the Lab2Debug class
     *
     * @param  args  command line arguments
     */
    public static void main(String[] args) {

        int counter = 5;

        while (counter > 0) {
            System.out.println("in the loop: " + counter);
            //what goes after this line to stop the loop?
            counter = counter - 1;
        }
    }
}
