// package it up!
package java111.project5;

import java.text.*;
import java.util.*;

/** The PizzaChoice class contains information about different pizza options.
 *
 *  @author Elspeth Stalter-Clouse
 */

public class PizzaChoice {
    private  char[] sizes = {'S', 'M', 'L', 'X'};
    private  double[] prices = {6.99, 8.99, 12.50, 15.00};
    private  NumberFormat formatter  = NumberFormat.getCurrencyInstance();
    private  int index;

    /** the PizzaChoice constructor receives an int from the SelectPizza class
     *  @param choice the user's pizza size selection
     */
    public PizzaChoice(int choice) {
        index = choice;
    }

    /** the getSize method returns a size from the sizes array
     *  @return pizza size
     */
    public char getSize() {
        return sizes[index];
    }

    /** the getPrice method returns a price from the sizes array
     *  @return pizza price
     */
    public double getPrice() {
        return prices[index];
    }

    /** the toString method returns a String representation of a pizza's price
     *  @return pizza price string
     */
    public String toString() {
        return "The price is " + formatter.format(prices[index]);
    }
}
