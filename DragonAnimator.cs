using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class DragonAnimator : MonoBehaviour {
    Animator animator;
    string currentAnimation;

    void Awake() {
        animator = GetComponent<Animator>();
    }

    public void PlayAttackAnimation() {
        StopWalkingAndRunningAnimations();
        TryChangingAnimationTo("Attack_1");
    }

    public void PlayDeadAnimation() {
        StopWalkingAndRunningAnimations();
        TryChangingAnimationTo("Dead");
    }

    void TryChangingAnimationTo(string clipName) {
        if(currentAnimation == clipName)
            return;
        animator.SetTrigger(clipName);
        currentAnimation = clipName;
    }

    public void PlayWalkAnimation() {
        animator.SetBool("IsWalk", true);
    }

    public void StopWalkingAndRunningAnimations() {
        animator.SetBool("IsWalk", false);
        animator.SetBool("IsRun", false);
    }

    public void PlayRunAnimation() {
        animator.SetBool("IsWalk", true);
        animator.SetBool("IsRun", true);
    }
}
