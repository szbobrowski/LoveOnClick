using System;
using UnityEngine;

public class DragonAI : MonoBehaviour {
    GameObject player;
    DragonAnimator dragonAnimator;
    private Rigidbody rb;

    enum State {
	    Alive,
		Chasing,
		Dead
    }

    private State state = State.Alive;
    
	void Start () {
	    player = GameObject.FindGameObjectWithTag("Player");
	    dragonAnimator = GetComponent<DragonAnimator>();
	    rb = GetComponent<Rigidbody>();
	}
	
	void Update ()
	{
		switch (state)
		{
			case State.Alive:
				LookAtPlayer();
				if (Vector3.Distance(transform.position, player.transform.position) < 30)
				{
					state = State.Chasing;
				}
				break;
			case State.Chasing:
				LookAtPlayer();
				rb.velocity = transform.forward * 5;
				KillPlayerIfTooClose();
				break;
			case State.Dead:
				break;
		}
		
		LookAtPlayer();
		
		dragonAnimator.PlayWalkAnimation();
		
	}

	private void OnCollisionEnter(Collision collision)
	{
		if (collision.gameObject.tag == "Trap")
		{
			dragonAnimator.PlayDeadAnimation();
			state = State.Dead;
		}
	}

	private void LookAtPlayer()
	{
		transform.LookAt(player.transform);
	}

	private void KillPlayerIfTooClose()
	{
		if (Vector3.Distance(transform.position, player.transform.position) < 10)
		{
			dragonAnimator.PlayAttackAnimation();
			EndGameUi.ShowTextAndQuit("YOU DIED");
		}
	}
}
