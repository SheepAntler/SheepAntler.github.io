/** Demonstrating if/else statements and booleans
 *
 * @author Elspeth Stalter-Clouse
 */
 public class ConditionalDemo {
     /** Create a variable and then use if/else
      * checks to perform displays of appropriate messages
      */
      public static void main(String[] args) {
          int myNumber = 10;

          if (myNumber == 40) {
              System.out.println("The number is 40. Look! " + myNumber + "!");
          } else if (myNumber == 30) {
              System.out.println("The number is 30. Look! " + myNumber + "!");
          } else {
              System.out.println("The number is not 30 or 40. It is " + myNumber + ".");
          }
      }
 }
