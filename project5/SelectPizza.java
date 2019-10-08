// package it up!
package java111.project5;

/** The SelectPizza class gets a pizza size selection from the user and
 *  prints it to the command line
 *
 *  @author Elspeth Stalter-Clouse
 */

public class SelectPizza {

    /** The processSelection() method gets user input and prints the
     *  results to the terminal window
     *
     *  @throws java.lang.ArrayIndexOutOfBoundsException if pizza size selection is not in the given range
     *  @throws java.lang.NumberFormatException if pizza size selection is accidentally entered as a letter
     *  @throws java.lang.Exception if user does not enter 1, 2, 3, or 4
     */

    public void processSelection()
        throws Exception {
        char selection;
        String choice = "";
        int index = 0;

        System.out.print("Select a pizza size "
                 + "(Type 1 for S, 2 for M, 3 for L, 4 for X): ");

        selection = (char) System.in.read();
        choice = choice + selection;
        index = Integer.parseInt(choice) - 1;

        PizzaChoice thisChoice  = new PizzaChoice(index);

        System.out.println(thisChoice);
    }

}
